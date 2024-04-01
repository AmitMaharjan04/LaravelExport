<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithMapping, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data,$sn = 0;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'S.N',
            'Name',
            'Email',
            'Phone',
            'Address',
        ];
    }

    public function map($row): array
    {
        $this->sn++;

        return [
            $this->sn++,
            $row['name'],
            $row['email'],
            $row['phone'],
            $row['address'],
        ];
    }

}
