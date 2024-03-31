<?php

namespace App\Http\Controllers\User;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Jobs\ExportExcel;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function githubRedirect(){
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback(){
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

        return redirect()->route('dashboard');
    }

    public function dashboard(){
        return view('user.dashboard');
    }

    public function export(Request $request){
        // dump($request->all());
        $fileContent = file_get_contents($request->import_file->getPathname());
        $file = json_decode($fileContent, true);

        ExportExcel::dispatch($file);
        // Excel::download(new UserExport($file), 'users.xlsx');

        return redirect()->back()->with('success','Data exported successfully!');
        // dd($file);
        // Excel::store(new UserExport($file), 'example.xlsx');

        // Dispatch the job
        // ExportExcel::dispatch($file)->delay(now()->addSeconds(10));
        // dd($file);
    }
}
