<?php

namespace App\Http\Controllers;

use App\Models\DownloadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class ReportController extends Controller
{
    public function indexDownload()
    {
        $data = DownloadLog::with(['user.people'])
            // ->whereRaw($query)
            // ->whereDate('created_at', '>=', date('Y-m-d', strtotime($request->start)))
            // ->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->finish)))
            ->orderBy('id', 'ASC')
            ->get();
            // return $data;
        return view('report.download.report');
    }
    public function listDownload(Request $request)
    {
        // dump($request);
        $type = $request->type;

        $query = 'type = "'.$request->type.'"';
        if($request->type == 'Todos')
        {
            $query = 1;
        }
        $data = DownloadLog::with(['user'])
            ->whereRaw($query)
            ->whereDate('created_at', '>=', date('Y-m-d', strtotime($request->start)))
            ->whereDate('created_at', '<=', date('Y-m-d', strtotime($request->finish)))
            ->orderBy('id', 'ASC')
            ->get();
        // dump($data);


        if($request->print){
            $start = $request->start;
            $finish = $request->finish;
            return view('report.download.print', compact('data', 'start', 'finish', 'type'));
        }else{
            return view('report.download.list', compact('data'));
        }
        
    }


    // Reporte de iniciuo de secion
    public function indexAuth()
    {
        return view('report.auth.report');
    }

    public function listAuth(Request $request)
    {
        // dump($request);
        $data = DB::table('authentication_log as a')
            ->whereDate('a.login_at', '>=', date('Y-m-d', strtotime($request->start)))
            ->whereDate('a.login_at', '<=', date('Y-m-d', strtotime($request->finish)))
            ->orderBy('id', 'ASC')
            ->get();
        // dump($data);



        if($request->print){
            $start = $request->start;
            $finish = $request->finish;
            return view('report.auth.print', compact('data', 'start', 'finish'));
        }else{
            return view('report.auth.list', compact('data'));
        }
        
    }
    
}
