<?php

namespace App\Http\Controllers;

use App\Exports\DebtorExport;
use App\Imports\DebtorImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Debtor;
use App\Models\People;

class DebtorController extends Controller
{
    public function index()
    {
        if(!Auth::user()->hasRole('admin') && Auth::user()->hasRole('user'))
        {
            $person = People::where('user_id', Auth::user()->id)->first();
            $debt = Debtor::where('code', $person ? $person->code : null)->where('deleted_at', null)->get();
            $year = DB::table('debtors')->where('code', $person ? $person->code : null)->where('deleted_at', null)->select('year')->groupBy('year')->get();
            $mes = DB::table('debtors')->where('code', $person ? $person->code : null)->where('deleted_at', null)->where('status', 0)
                ->select('month', 'year', DB::raw("SUM(amount) as monto"))->groupBy('month', 'year')->orderBy('month', 'ASC')->orderBy('year', 'ASC')->get();

            return view('debtor.browse', compact('person', 'debt', 'year', 'mes'));
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
            return redirect()->route('voyager.debtors.index')->with(['message' => 'Importado exitosamente.', 'alert-type' => 'success']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('voyager.debtors.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }

    }

    public function detalle($code, $mes, $ano)
    {
        // return $mes;
        return Debtor::where('code', $code)->where('year', $ano)->where('month', $mes)->where('status', 0)->where('deleted_at', null)->get();
    }

    public function exportar()
    {
        $date = Carbon::now();
        $data = Debtor::where('deleted_at',null)->get();
        return Excel::download(new DebtorExport($data), 'Consulta'.$date.'.xlsx');
    }

    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'code' => 'required|unique:people|max:10',
        ]);
        
        try {
            People::create([
                'user_id' => Auth::user()->id,
                'ci' => $request->ci,
                'phone' => $request->phone,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'type' => 'Socio',
                'code' => $request->code
            ]);

            return redirect()->route('voyager.debtors.index')->with(['message' => 'Datos registrados', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('voyager.debtors.index')->with(['message' => 'Ocurrió un error', 'alert-type' => 'error']);
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            $debt = Debtor::where('id', $request->id)->first();
            $debt->update(['deleted_at'=>Carbon::now()]);
            DB::commit();
            return redirect()->route('voyager.debtors.index')->with(['message' => 'Eliminado exitosamente.', 'alert-type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('voyager.debtors.index')->with(['message' => 'Error....', 'alert-type' => 'error']);
        }
    }
}
