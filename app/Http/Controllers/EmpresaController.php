<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //
    public function index()
    {
        $e = Empresa::all();
        return response()->json($e);
    }

    public function show($id)
    {
        $e = Empresa::find($id);

        if(!$e) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($e);
    }

    public function store(Request $request)
    {
        $e = new Empresa();
        $e->fill($request->all());
        $e->save();

        return response()->json($e, 201);
    }

    public function update(Request $request, $id)
    {
        $e = Empresa::find($id);

        if(!$e) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $e->fill($request->all());
        $e->save();

        return response()->json($e);
    }

    public function destroy($id)
    {
        $e = Empresa::find($id);

        if(!$e) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $e->delete();
    }


}
