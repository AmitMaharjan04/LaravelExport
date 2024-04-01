<?php

namespace App\Http\Controllers\User;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Jobs\DownloadExport;
use App\Jobs\ExportExcel;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\FileRequest;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function githubRedirect(){
        return Socialite::driver('github')->redirect();
    }

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
            Auth::login($user);
            $msg = "Welcome " . $githubUser->name;
            return redirect()->route('dashboard')->with('success',$msg);
        }catch(Exception $e){
            return redirect()->route('login')->with('error','Unable to login. Please try again!');
        }
    }

    public function dashboard(){
        // dd(session()->all());
        $check = false;
        return view('user.dashboard',compact('check'));
    }

    public function export(FileRequest $request){
        // dd($request->file->getClientMimeType());
        // $validator = Validator::make($request->all(), [
        //     'file' => 'required|file|mimetypes:application/json,text/plain|max:5000', 
        // ]);
    
        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $fileContent = file_get_contents($request->file->getPathname());
        $file = json_decode($fileContent, true);
        // $filePath = 'exports/users.xlsx';
        $originalFileName = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($originalFileName, PATHINFO_FILENAME);

        // dd($fileNameWithoutExtension);
        // Excel::store(new UserExport($file), $filePath);
        $path = ExportExcel::dispatch($file,$fileName);
        // dd($path);
        // DownloadExport::dispatch($path);
        // sleep(10); // Wait for 10 seconds (just an example, adjust as needed)
        // $filePath = 'exports/' . time() . '.xlsx';
        // // Check if the file exists and download it
        // if (Storage::exists(storage_path('app/'.$filePath))) {
        //     // Generate download link or directly download the file
        //     return response()->download(storage_path('app/'.$filePath));
        // } else {
        //     dd("qwe");
        //     // Handle error if file is not found
        // }
        // dd(Storage::exists('exports/users.xlsx'));
        // return Excel::download(new UserExport($file), 'users.xlsx');
        // return redirect()->route('download', ['file' => $asd]);
        $path = 'exports/'.$fileName . '.xlsx';
        $check = true;
        return view('user.dashboard',compact('check','path','fileName'))->with('success','Data export has been queued. You will be notified when the file is ready for download.');
        return redirect()->back()->with([
            'success' => 'Data export has been queued. You will be notified when the file is ready for download.',
            'check' => $check
        ]);
        // return redirect()->route('download');//'Data exported successfully!'
        // dd($file);
        // Excel::store(new UserExport($file), 'example.xlsx');

        // Dispatch the job
        // ExportExcel::dispatch($file)->delay(now()->addSeconds(10));
        // dd($file);
    }

    // public function downloadExcel(Request $request)
    // {
        
    //     $filePath = $request->input('file');
    //     dd($filePath);
    //     // Optionally, you can perform additional checks here to ensure the file exists, etc.

    //     return response()->download(storage_path("app/{$filePath}"), 'users.xlsx');
    // }

    public function exportDownload($path){
        $path = 'exports/'.$path . '.xlsx';
        return response()->download(storage_path("app/".$path), 'exported_file.xlsx')->deleteFileAfterSend(true);
        Storage::download($path);
        // $data = json_decode($request->getContent(), true);
        // $filePath = $data['filePath'];
        // dd(Storage::exists($filePath));
        $filePath = '';
        Storage::download($filePath);
        return Storage::download(storage_path('app/'.$filePath));
        // dd($filePath);
        // // Storage::download(storage_path('exports/'))
        // dd("q");
        return response()->download(storage_path("app/".$filePath), 'exported_file.xlsx');
        // return response()->download(storage_path("app/public/exports/users.xlsx"), 'exported_file.xlsx');
        
    }
    public function logout(){
        session()->flush(); 
        Auth::logout();
        return redirect()->route('login');
    }
}
