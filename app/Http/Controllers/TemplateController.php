<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use App\Models\Telephony;

class TemplateController extends Controller
{
    public function index()
    {
        
        return view('welcome');
    }

    public function list($search = null){
        if($search)
        {
            $paginate = 5;
            // dump($paginate);
            $data = Telephony::where(function($query) use ($search){
                        $query->OrWhereRaw($search ? "full_name like '%$search%'" : 1)
                        ->OrWhereRaw($search ? "phone like '%$search%'" : 1);
                        })
                        ->where('deleted_at', NULL)->orderBy('id', 'DESC')->paginate($paginate);
                        // $data = 1;
                        // dd($data->links());
            return view('search', compact('data'));
        }

    }

    public function store(Request $request)
    {
        $data = People::create([
            'ci'=>$request->ci,
            'phone'=>$request->phone,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'type'=>$request->type
        ]);
        // return $data;
        return response()->json(['data' => $data]);

    }

}
