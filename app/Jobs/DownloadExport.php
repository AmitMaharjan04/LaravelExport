<?php

namespace App\Jobs;

use App\Http\Repositories\UserRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DownloadExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $filePath;
    public $userRepo;
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
        $this->userRepo = new UserRepository;
    }

    public function handle()
    {
        // Build the full file path
        // $fullPath = storage_path('app/' . $this->filePath);
        // dd("here");
        $path = 'exports/users.xlsx';
        Log::info("in download export1");
        $this->userRepo->download($path);
        Log::info("in download export2");
        // Log::info(Storage::path('exports/users.xlsx'));
        // Storage::download('exports/users.xlsx');
        // return response()->download(Storage::path('exports/users.xlsx'))->deleteFileAfterSend(true);
        // return redirect()->route('download-export');
        // // Download the file
        // return response()->download($this->filePath, 'your-export-file.xlsx')->deleteFileAfterSend(true);
    }
}
