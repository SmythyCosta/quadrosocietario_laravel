<?php

namespace App\Http\Controllers;

use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
	//
    public function index()
    {
        $e = Socio::all();
        return response()->json($e);
    }

    public function show($id)
    {
        $e = Socio::find($id);

        if(!$e) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($e);
    }

    public function store(Request $request)
    {

        $obj = new Socio();
        $obj->nome = $request->input('nome');
        $obj->empresa_id = $request->input('empresa_id');
        $obj->save();

        return response()->json($obj, 201);
    }

    public function update(Request $request, $id)
    {
        $obj = Socio::find($id);

        if(!$obj) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $obj->nome = $request->input('nome');
        $obj->empresa_id = $request->input('empresa_id');
        $obj->save();

        return response()->json($obj);
    }

    public function destroy($id)
    {
        $obj = Socio::find($id);

        if(!$obj) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $obj->delete();
    }

}