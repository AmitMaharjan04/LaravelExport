<?php

namespace App\Jobs;

use App\Events\ExportJobCompleted;
use App\Exports\UserExport;
use App\Listeners\HandleExportJobCompletion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;

class ExportExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $data,$fileName;

    public function __construct($data,$fileName)
    {
        $this->data = $data;
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // $filePath = 'exports/' . time() . '.xlsx';
        $filePath = 'exports/' . $this->fileName . '.xlsx';
        Excel::store(new UserExport($this->data), $filePath);

        // broadcast(new \App\Events\ExportJobCompleted($filePath));
        // dispatch(new DownloadExport($filePath));
        // dd(Storage::exists(storage_path('app/exports/users.xlsx')));
        // Storage::download(storage_path('app/'.$filePath));
        // $filePath = storage_path('app/exports/users.xlsx');
        // dd($filePath);
        // return $filePath;
        // return response()->download($filePath, 'your-export-file.xlsx')->deleteFileAfterSend(true);
        // Event::dispatch(new ExportJobCompleted($filePath));
    }
}
