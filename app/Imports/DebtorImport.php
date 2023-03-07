<?php

namespace App\Imports;

use App\Models\Debtor;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class DebtorImport implements ToModel
{
    public function model(array $row)
    {
        if (is_numeric($row[0])) {
            $user = Auth::user()->id;

            return new Debtor([
                'code'       => $row[0]??NULL,
                'service_id'   => $row[1]??NULL,
                'details'   => $row[2]??NULL,
                'amount'   => $row[3]??NULL,
                'month'   => $row[4]??NULL,
                'year'   => $row[5]??NULL,
                'status'   => $row[6]??NULL,
                'registerUser_id' => $user
            ]);
        }
        else
        {
            return null;
        }
    }
}
