<?php

namespace App\Imports;

use App\Models\SubDealer;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
class subDealerImporter implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable;
    
    
    public function model(array $row)
    {
        return new SubDealer([
            "name"=>$row["name"],
            "cnic"=>$row["cnic"],
            "phone"=>$row["phone"],
            "prefix"=>$row["prefix"],
            "address"=>$row["address"],
            "office_id"=>Auth::user()->office,
            "company_id"=>Auth::user()->company,
            "created_user"=>Auth::id()
        ]);
    }
}
