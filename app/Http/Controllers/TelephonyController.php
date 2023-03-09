<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Telephony;
use Illuminate\Support\Facades\DB;
use App\Imports\TelephonyImport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TelephonyController extends Controller
{
    public function index()
    {
        return view('telephony.browse');
    }

    public function list($search = null){
        $paginate = request('paginate') ?? 10;
        $data = Telephony::where(function($query) use ($search){
                    $query->OrWhereRaw($search ? "full_name like '%$search%'" : 1)
                    ->OrWhereRaw($search ? "phone like '%$search%'" : 1);
                    })
                    ->where('deleted_at', NULL)->orderBy('full_name', 'ASC')->paginate($paginate);
                    // $data = 1;
                    // dd($data->links());
        return view('telephony.list', compact('data'));
    }

    public function import(Request $request)
    {
        DB::beginTransaction();
        try {
            Telephony::where('deleted_at', null)->update(['deletedUser_id'=>Auth::user()->id, 'deleted_at'=>Carbon::now()]);
            $file = $request->file('file');
            Excel::import(new TelephonyImport, $file);
            DB::commit();
            return redirect()->route('telephony.index')->with(['message' => 'Importado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('telephony.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }

    }
}
