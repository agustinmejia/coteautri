<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class TemplateController extends Controller
{
    public function index()
    {
        
        return view('welcome');
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
