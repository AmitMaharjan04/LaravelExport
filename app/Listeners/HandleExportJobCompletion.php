<?php

namespace App\Listeners;

use App\Events\ExportJobCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\UserRepository;

class HandleExportJobCompletion implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public $userRepo;
    public function __construct()
    {
        $this->userRepo = new UserRepository;
    }

    /**
     * Handle the event.
     */
    public function handle(ExportJobCompleted $event)
    {
        // return response()->download($event->path,'users.xlsx');
        // return Storage::download('exports/users.xlsx','test.xlsx');
        // dump($event->path);
        // session()->put('status','done');
        // $this->userRepo->download($event->path);
        // return Storage::download($event->path,'test.xlsx');
        // return redirect()->route('download.excel');
    }
}
