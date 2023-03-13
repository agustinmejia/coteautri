<?php

namespace App\Imports;

use App\Models\Debtor;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

use function Psy\debug;

class DebtorImport implements ToModel
{
    public function model(array $row)
    {
        if (is_numeric($row[0]) && is_numeric($row[1]) &&  is_numeric($row[3]) &&  is_numeric($row[4]) && is_numeric($row[5]) && is_numeric($row[6])       && isset($row[0]) && isset($row[1]) && isset($row[3]) && isset($row[4]) && isset($row[5]) && isset($row[6]))
        {
            $user = Auth::user()->id;

            $debt = Debtor::where('code', $row[0])->where('service_id', $row[1])->where('month', $row[4])->where('year', $row[5])->first();
            if($debt)
            {
                $debt->update([
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
            
        }
        else
        {
            // return null;
        }
    }
}
