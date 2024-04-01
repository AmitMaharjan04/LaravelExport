<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\Storage;

class UserRepository{
    /**
     * @var ApiResponseHelper
     */

    public function __construct()
    {
    }

    public function download($path){
        return Storage::download($path,'test.xlsx');
    }
}