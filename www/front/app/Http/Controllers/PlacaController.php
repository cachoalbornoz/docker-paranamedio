<?php

namespace App\Http\Controllers;

use App\Models\DataLogger;
use App\Models\Estacion;
use App\Models\Placa;
use App\Models\TipoPlaca;
use Auth;
use Illuminate\Http\Request;

class PlacaController extends Controller
{

    private $municipio_id;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            $this->municipio_id = (Auth::user()->municipio_id) ? Auth::user()->municipio_id : null;
            return $next($request);
        });
    }

    public function index()
    {
        return view('placas.index');
    }

    public function getPlacas(Request $request)
    {
        $totalData     = $placas = Placa::select('f_idplaca')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $placas = Placa::select('tbl_placas.f_idplaca', 'tbl_placas.f_nombre', 'tbl_placas.f_ip', 'tbl_placas.f_detalle')
                ->offset($start)
                ->limit($limit)
                ->orderBy('tbl_placas.f_nombre', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $placas = Placa::select('tbl_placas.f_idplaca', 'tbl_placas.f_nombre', 'tbl_placas.f_ip', 'tbl_placas.f_detalle')
                ->Where('tbl_placas.f_nombre', 'LIKE', '%' . $search . '%')
                ->orWhere('tbl_placas.f_ip', 'LIKE', '%' . $search . '%')
                ->offset($start)
                ->limit($limit)
                ->orderBy('tbl_placas.f_nombre', 'asc')
                ->get();

            $totalFiltered = Placa::select('tbl_placas.f_idplaca', 'tbl_placas.f_nombre', 'tbl_placas.f_ip', 'tbl_placas.f_detalle')
                ->Where('tbl_placas.f_nombre', 'LIKE', '%' . $search . '%')
                ->orWhere('tbl_placas.f_ip', 'LIKE', '%' . $search . '%')
                ->limit($limit)
                ->count();
        }

        $data = [];
        if (!empty($placas)) {
            foreach ($placas as $placa) {
                $Data['id']      = $placa->f_idplaca;
                $Data['check']   = "<input type='checkbox' value=" . $placa['f_idplaca'] . " name='borrar[]' />";
                $Data['nombre']  = '<a href= "' . route('placas.edit', $placa->f_idplaca) . '">' . $placa->f_nombre . '</a>';
                $Data['ip']      = $placa->f_ip;
                $Data['detalle'] = $placa->f_detalle;
                $data[]          = $Data;
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
        $tipoplacas = TipoPlaca::orderBy('f_nombre')->get();
        $estaciones = Estacion::orderBy('f_nombre')->get();
        return view('placas.create', compact('tipoplacas', 'estaciones'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_nombre'     => 'required|unique:tbl_placas,f_nombre',
            'f_ip'         => 'required',
            'f_idestacion' => 'required',

        ]);

        // Guardar los datos de la Placa
        $input                 = $request->except(['_token']);
        $input['f_habilitada'] = isset($request->f_habilitada) ? 1 : 0;
        Placa::create($input);

        return redirect()->route('placas.index');
    }

    public function show($id)
    {
        $placa = Placa::find($id);
        return view('placas.show', compact('placa'));
    }

    public function edit($id)
    {
        $placa      = Placa::find($id);
        $tipoplacas = TipoPlaca::orderBy('f_nombre')->get();
        $estaciones = Estacion::orderBy('f_nombre')->get();
        return view('placas.edit', compact('placa', 'tipoplacas', 'estaciones'));
    }

    public function update(Request $request, $id)
    {
        $placa                  = Placa::find($id);
        $placa->f_nombre        = $request->f_nombre;
        $placa->f_detalle       = $request->f_detalle;
        $placa->f_ip            = $request->f_ip;
        $placa->f_orden         = $request->f_orden;
        $placa->f_fecha_montaje = $request->f_fecha_montaje;
        $placa->f_fecha_baja    = $request->f_fecha_baja;
        $placa->f_idtipoplaca   = $request->f_idtipoplaca;
        $placa->f_idestacion    = $request->f_idestacion;
        $placa->f_habilitada    = isset($request->f_habilitada) ? 1 : 0;
        $placa->save();

        return redirect()->route('placas.index');
    }

    public function destroy(Request $request)
    {
        Placa::whereIn('f_idplaca', $request->input('values'))->delete();
        return response()->json([]);
    }

}
