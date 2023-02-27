<?php

namespace App\Http\Controllers;

use App\Models\DownloadLog;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ReportController extends Controller
{
    public function indexDownload()
    {
        return view('report.download.report');
    }
    public function listDownload(Request $request)
    {
        // dump($request);

        $query = 'type = "'.$request->type.'"';
        if($request->type == 'Todos')
        {
            $query = 1;
        }
        $data = DownloadLog::whereRaw($query)
            ->whereDate('created_at', '>=', date('Y-m-d', strtotime($request->start)))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->finish)))
            ->orderBy('id', 'ASC')
            ->get();
        // dump($data);


        if($request->print){
            $start = $request->start;
            $finish = $request->finish;
            return view('report.download.print', compact('data', 'start', 'finish'));
        }else{
            return view('report.download.list', compact('data'));
        }
        
    }


    // Reporte de iniciuo de secion
    public function indexAuth()
    {
        return view('report.auth.report');
    }
}
