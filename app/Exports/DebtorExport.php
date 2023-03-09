<?php

namespace App\Exports;

use App\Models\Debtor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DebtorExport implements FromView
{
    function __construct($data) {
		$this->datas = $data;
    }

    public function view(): View
    {
        return view('debtor.export.view',
        [
            'data'=>$this->datas,
        ]);
    }
}
