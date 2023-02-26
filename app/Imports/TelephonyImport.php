<?php

namespace App\Imports;

use App\Models\Telephony;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class TelephonyImport implements ToModel
{
    
    public function model(array $row)
    {

        if (is_numeric($row[0])) {
            $user = Auth::user()->id;

            return new Telephony([
                'phone'       => $row[0]??NULL,
                'full_name'   => $row[1]??NULL,
                'registerUser_id' => $user
            ]);
        }
        else
        {
            return null;
        }


    }
}
