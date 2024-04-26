<?php

namespace App\Exports;

use App\Models\subDealer;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class subDealerExporter implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \subDealer::select("name","cnic","phone","prefix","address")->where("office_id","=",Auth::user()->office)->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'name',
            'cnic',
            'phone',
            'prefix',
            'address'
        ];
    }
}
