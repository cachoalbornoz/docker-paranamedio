<?php

namespace App\Http\Controllers;

use App\Models\Estacion;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Log;

class MunicipioController extends Controller
{

    public function index()
    {
        return view('municipios.index');
    }

    public function getMunicipios(Request $request)
    {
        $totalData     = $municipios = Municipio::select('f_idmunicipio')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $municipios = Municipio::select('f_idmunicipio', 'f_nombre', 'f_contacto')
                ->offset($start)
                ->limit($limit)
                ->orderBy('f_nombre', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $municipios = Municipio::select('f_idmunicipio', 'f_nombre', 'f_contacto')
                ->where('f_nombre', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy('f_nombre', 'asc')
                ->get();

            $totalFiltered = Municipio::where('f_nombre', 'LIKE', "%{$search}%")->count();
        }

        $data = [];
        if (!empty($municipios)) {
            foreach ($municipios as $municipio) {
                $Data['id']             = $municipio->f_idmunicipio;
                $Data['check']          = "<input type='checkbox' value=" . $municipio['f_idmunicipio'] . " name='borrar[]' />";
                $Data['nombre']         = '<a href= "' . route('municipios.edit', $municipio->f_idmunicipio) . '">' . $municipio->f_nombre . '</a>';
                $Data['contacto']       = $municipio->f_contacto;
                $Data['cantEstaciones'] = $municipio->cantEstaciones();
                $data[]                 = $Data;
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
        $estaciones = Estacion::orderBy('f_nombre')->get();
        return view('municipios.create', compact('estaciones'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_nombre' => 'required|unique:tbl_municipios,f_nombre',
        ]);

        $input     = $request->all();
        $municipio = Municipio::create($input);

        if(!empty($request->input('estaciones'))) {
            Estacion::whereIn('f_idestacion', $request->input('estaciones'))->update(['f_idmunicipio' => $municipio->f_idmunicipio]);
        }

        return redirect()->route('municipios.index');
    }

    public function show($id)
    {
        $municipio = Municipio::find($id);
        return view('municipios.show', compact('municipio'));
    }

    public function edit($id)
    {
        $municipio  = Municipio::find($id);
        $estaciones = Estacion::orderBy('f_nombre')->get();
        return view('municipios.edit', compact('municipio', 'estaciones'));
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::whereFIdmunicipio($id)->update([
            'f_nombre'   => $request->f_nombre,
            'f_contacto' => $request->f_contacto,
        ]);

        $municipio = Municipio::find($id);

        if(!empty($request->input('estaciones'))) {
            Estacion::whereIn('f_idestacion', $request->input('estaciones'))->update(['f_idmunicipio' => $municipio->f_idmunicipio]);
        }

        return redirect()->route('municipios.index');
    }

    public function destroy(Request $request)
    {
        // Log::info('Estaciones');
        Municipio::whereIn('f_idmunicipio', $request->input('values'))->delete();
        return response()->json([]);
    }

}
