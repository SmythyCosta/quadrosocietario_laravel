<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    //
    public function index()
    {
        $obj = Empresa::all();
        return response()->json(['empresas' => $obj]);
    }

    public function show($id)
    {
        $obj = Empresa::find($id);

        if(!$obj) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json(['empresa' => $obj]);
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

    /**
     * Retorna os Socios de uma empresa
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function empreaSociosById($id)
    {

        $obj = DB::table('socio')
                    ->leftJoin('empresa', 'empresa.id', '=', 'socio.empresa_id')
                    ->select('socio.id',
                            'socio.nome',
                            'empresa.nome as empresa')
                    ->where('empresa.id', $id)
                    ->get();

        return response()->json(['socios' => $obj]);

    }


}
