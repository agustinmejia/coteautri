<?php

namespace App\Http\Controllers;

use App\Imports\DebtorImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Debtor;
use App\Models\People;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DebtorController extends Controller
{
    public function index()
    {
        if(!Auth::user()->hasRole('admin') && Auth::user()->hasRole('user'))
        {
            $user = People::where('user_id', Auth::user()->id)->first();
            $debt = Debtor::where('code', $user->code)->where('deleted_at', null)->get();
            // return $debt;
            $year = DB::table('debtors')->where('code', $user->code)->where('deleted_at', null)->select('year')->groupBy('year')->get();
            $mes = DB::table('debtors')->where('code', $user->code)->where('deleted_at', null)->select('month', 'year', DB::raw("SUM(amount) as monto"))->groupBy('month', 'year')->get();
            // return $mes;

            return view('debtor.browse', compact('user', 'debt', 'year', 'mes'));
        }
        if(Auth::user()->hasRole('admin'))
        {
            return view('debtor.browse');
        }
    }


    public function list($search = null){
        $paginate = request('paginate') ?? 10;
        $data = Debtor::where(function($query) use ($search){
                    $query->OrWhereRaw($search ? "code like '%$search%'" : 1)
                    ->OrWhereRaw($search ? "details like '%$search%'" : 1)
                    ->OrWhereRaw($search ? "year like '%$search%'" : 1)
                    ->OrWhereRaw($search ? "status like '%$search%'" : 1);
                    })
                    ->where('deleted_at', NULL)->orderBy('id', 'ASC')->paginate($paginate);
                    // $data = 1;
                    // dd($data->links());
        return view('debtor.list', compact('data'));
    }

    public function import(Request $request)
    {
        // return $request;
        // dd($request);
        DB::beginTransaction();
        try {
            // Debtor::where('deleted_at', null)->update(['deletedUser_id'=>Auth::user()->id, 'deleted_at'=>Carbon::now()]);
            // return 1;
            $file = $request->file('file');
            Excel::import(new DebtorImport, $file);
            DB::commit();
            return redirect()->route('debtor.index')->with(['message' => 'Importado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('debtor.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }

    }

    public function detalle($code, $mes, $ano)
    {
        // return $mes;
        return Debtor::where('code', $code)->where('year', $ano)->where('month', $mes)->where('deleted_at', null)->get();
    }
}
