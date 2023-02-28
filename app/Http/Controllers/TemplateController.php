<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Telephony;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    public function index()
    {
        
        return view('welcome');
    }

    public function register()
    {
        return view('register');
    }

    public function list($search = null){
        if($search)
        {
            $op = 0;
            if(is_numeric($search))
            {
                $op = 1;
            }
            $paginate = 5;
            // dump($paginate);
            $data = Telephony::where(function($query) use ($search){
                        $query->OrWhereRaw($search ? "full_name like '%$search%'" : 1)
                        ->OrWhereRaw($search ? "phone like '%$search%'" : 1);
                        })
                        ->where('deleted_at', NULL)->orderBy('id', 'DESC')->paginate($paginate);
                        // $data = 1;
                        // dd($data->links());
            return view('search', compact('data', 'op'));
        }

    }

    public function store(Request $request)
    {

        // return $request;
        $request->validate(
        [
            'email' => 'required|email|unique:users'
        ]);
        DB::beginTransaction();
        try {
            $ok = User::where('email', $request->email)->first();
            if($ok)
            {

                return redirect()->back()->with(['message' => 'El email ya existe.', 'alert-type' => 'error']);
            }
            // return 1;
            $user = User::create([
                'name' => $request->first_name,
                'email' => $request->email,
                'role_id' => 2,
                'password' =>bcrypt($request->password)
            ]);

            $data = People::create([
                'user_id' => $user->id,
                'ci'=>$request->ci,
                'phone'=>$request->phone,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'type'=>$request->type
            ]);
            // return $data;
            $ok = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            DB::commit();

            if (Auth::attempt($ok)) {
                // return 1;
                $request->session()->regenerate();
                return redirect('admin');
            }
            // return response()->json(['data' => $data]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return 0;
        }

    }

}
