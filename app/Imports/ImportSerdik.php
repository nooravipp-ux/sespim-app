<?php

namespace App\Imports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportSerdik implements ToCollection, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            DB::table('users')->insert([
                "name" => $row[2],
                "email" => $row[1],
                "role_id" => 2,
                "password" => Hash::make($row[2]),
            ]);
    
            $lastId = DB::table('users')->orderBy('id', 'desc')->first();
    
            DB::table('t_identitas')->insert([
                "nama_lengkap" => $row[0],
                "user_id" => $lastId->id,
                "nrp" => $row[2],
                "email" => $row[1],
                "dikbang" => $row[3],
                "created_at" => date("Y-m-d H:i:s"),
                "created_by" => Auth::user()->name
            ]);
        }
    }

    public function startRow(): int 
    {
        return 2;
    }
}
