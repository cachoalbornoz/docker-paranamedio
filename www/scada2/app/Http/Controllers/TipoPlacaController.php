<?php

namespace App\Http\Controllers;

use App\Models\TipoPlaca;
use Illuminate\Http\Request;

class TipoPlacaController extends Controller
{

    public function index()
    {
        return view('tipoplaca.index');
    }

    public function getTipoPlacas(Request $request)
    {
        $totalData     = $tipoplaca = TipoPlaca::select('f_idtipoplaca')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $tipoplacas = TipoPlaca::select('f_idtipoplaca', 'f_nombre', 'f_modelo')
                ->offset($start)
                ->limit($limit)
                ->orderBy('f_nombre', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $tipoplacas = TipoPlaca::select('f_idtipoplaca', 'f_nombre', 'f_modelo')
                ->where('f_nombre', 'LIKE', "%{$search}%")
                ->orWhere('f_modelo', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('f_nombre', 'asc')
                ->get();

            $totalFiltered = TipoPlaca::where('f_nombre', 'LIKE', "%{$search}%")->count();
        }

        $data = [];
        if (!empty($tipoplaca)) {
            foreach ($tipoplacas as $tipoplaca) {
                $Data['id']     = $tipoplaca->f_idtipoplaca;
                $Data['check']  = "<input type='checkbox' value=" . $tipoplaca['f_idtipoplaca'] . " name='borrar[]' />";
                $Data['nombre'] = '<a href= "' . route('tipoplaca.edit', $tipoplaca->f_idtipoplaca) . '">' . $tipoplaca->f_nombre . '</a>';
                $Data['modelo'] = $tipoplaca->f_modelo;
                $data[]         = $Data;
            }
        }

        $json_data = [
            'draw'            => intval($request->input('draw')),
            'recordsTotal'    => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data'            => $data,
        ];

        print json_encode($json_data);

    }

    public function create()
    {
        return view('tipoplaca.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_nombre' => 'required|unique:tbl_tipo_placa,f_nombre',
        ]);

        $input = $request->all();
        TipoPlaca::create($input);

        return redirect()->route('tipoplaca.index');
    }

    public function show($id)
    {
        $tipoplaca = TipoPlaca::whereFIdtipoplaca($id)->first();
        return view('tipoplaca.show', compact('tipoplaca'));
    }

    public function edit($id)
    {
        $tipoplaca = TipoPlaca::whereFIdtipoplaca($id)->first();
        return view('tipoplaca.edit', compact('tipoplaca'));
    }

    public function update(Request $request, $id)
    {
        TipoPlaca::whereFIdtipoplaca($id)->update([
            'f_nombre' => $request->f_nombre,
            'f_modelo' => $request->f_modelo,
        ]);

        return redirect()->route('tipoplaca.index');
    }

    public function destroy(Request $request)
    {
        TipoPlaca::whereIn('f_idtipoplaca', $request->input('values'))->delete();
        return response()->json([]);
    }

}
