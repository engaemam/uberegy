<?php

namespace App\Exports;

use App\uberusers;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return uberusers::all();
    }
}
