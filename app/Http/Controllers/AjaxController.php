<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DownloadLog;

class AjaxController extends Controller
{
    public function downloadLg($cad)
    {
        return DownloadLog::create([
            'user_id'=>Auth::user()->id,
            'user'=>Auth::user()->name,
            'role'=>Auth::user()->role->name,
            'email'=>Auth::user()->email,
            'ip_address'=> request()->ip(),
            'user_agent'=> request()->userAgent(),
            'url'=>request()->url(),
            'downloadType'=>$cad
        ]);
        // return $cad;
    }
}
