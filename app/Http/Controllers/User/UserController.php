<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\ExportExcel;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Http\Requests\FileRequest;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    //redirection to github login API
    public function githubRedirect(){
        return Socialite::driver('github')->redirect();
    }

    //response from github login API
    public function githubCallback(){
        try{
            $githubUser = Socialite::driver('github')->user();
            $user = User::where('github_id',$githubUser->id)->first();
            if(!$user){
                $user = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'github_id' => $githubUser->id,
                ]);
            }
            //authenticate the user data from User Model 
            Auth::login($user);
            $msg = "Welcome " . $githubUser->name;
            return redirect()->route('dashboard')->with('success',$msg);
        }catch(Exception $e){
            Log::info('Exception occured.' . print_r($e->getMessage(),true));
            return redirect()->route('login')->with('error','Unable to login. Please try again!');
        }
    }

    public function dashboard(){
        //check is to see if file uploaded or not
        $check = false;
        return view('user.dashboard',compact('check'));
    }

    public function export(FileRequest $request){
        //retrieve the file content of json file
        $fileContent = file_get_contents($request->file->getPathname());
        $file = json_decode($fileContent, true);

        //retrieve the file name 
        $originalFileName = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);

        try{
            ExportExcel::dispatch($file,$fileName);

            $path = 'exports/'.$fileName . '.xlsx';
            $check = true;
            return view('user.dashboard',compact('check','path','fileName'))->with('success','Data export has been queued. You will be notified when the file is ready for download.');
        }catch(Exception $e){
            Log::info('Exception occured.' . print_r($e->getMessage(),true));
            return redirect()->back()->with('error','Something occured. Please try again!');
        }
    }

    public function exportDownload($path){
        $path = 'exports/'.$path . '.xlsx';
        return response()->download(storage_path("app/".$path), 'users.xlsx')->deleteFileAfterSend(true);
    }

    public function logout(){
        session()->flush(); 
        Auth::logout();
        return redirect()->route('login');
    }
}
