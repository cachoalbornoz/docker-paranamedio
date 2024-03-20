<?php

namespace App\Http\Controllers;

use App\Models\Estacion;
use App\Models\Municipio;
use Auth;
use Illuminate\Http\Request;
use Image;

class EstacionController extends Controller
{

    private $path;
    private $municipio_id;

    public function __construct()
    {
        $this->path = public_path('images/www/');
        !is_dir($this->path) && mkdir($this->path, 0777, true);

        $this->middleware(function ($request, $next) {
            $this->municipio_id = (Auth::user()->municipio_id) ? Auth::user()->municipio_id : null;
            return $next($request);
        });
    }

    public function index()
    {
        return view('estaciones.index');
    }

    public function getEstaciones(Request $request)
    {
        $totalData     = Estacion::MunicipioId($this->municipio_id)->select('f_idestacion')->count();
        $totalFiltered = $totalData;
        $limit         = $request->input('length');
        $start         = $request->input('start');

        if (empty($request->input('search.value'))) {
            $estaciones = Estacion::select('tbl_estaciones.f_idestacion', 'tbl_estaciones.f_nombre', 'tbl_estaciones.f_direccion', 'tbl_municipios.f_nombre as municipio')
                ->leftjoin('tbl_municipios', 'tbl_estaciones.f_idmunicipio', '=', 'tbl_municipios.f_idmunicipio')
                ->MunicipioId($this->municipio_id)
                ->offset($start)
                ->limit($limit)
                ->orderBy('tbl_estaciones.f_nombre', 'asc')
                ->get();

        } else {

            $search = $request->input('search.value');

            $estaciones = Estacion::select('tbl_estaciones.f_idestacion', 'tbl_estaciones.f_nombre', 'tbl_estaciones.f_direccion', 'tbl_municipios.f_nombre as municipio')
                ->leftjoin('tbl_municipios', 'tbl_estaciones.f_idmunicipio', '=', 'tbl_municipios.f_idmunicipio')
                ->MunicipioId($this->municipio_id)
                ->Where('tbl_estaciones.f_nombre', 'LIKE', '%' . $search . '%')
                ->orWhere('tbl_municipios.f_nombre', 'LIKE', '%' . $search . '%')
                ->offset($start)
                ->limit($limit)
                ->orderBy('tbl_estaciones.f_nombre', 'asc')
                ->get();

            $totalFiltered = Estacion::MunicipioId($this->municipio_id)->where('f_nombre', 'LIKE', '%' . $search . '%')->count();
        }

        $data = [];
        if (!empty($estaciones)) {
            foreach ($estaciones as $estacion) {
                $Data['id']        = $estacion->f_idestacion;
                $Data['check']     = "<input type='checkbox' value=" . $estacion['f_idestacion'] . " name='borrar[]' />";
                $Data['nombre']    = '<a href= "' . route('estaciones.edit', $estacion->f_idestacion) . '">' . $estacion->f_nombre . '</a>';
                $Data['direccion'] = $estacion->f_direccion;
                $Data['municipio'] = $estacion->municipio;
                $data[]            = $Data;
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
        $municipios = Municipio::orderBy('f_nombre')->get();
        return view('estaciones.create', compact('municipios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'f_nombre'      => 'required|unique:tbl_estaciones,f_nombre',
            'f_direccion'   => 'required',
            'f_idmunicipio' => 'required',
            'f_foto'        => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Guardar los datos de la Estacion
        $input                 = $request->except(['_token']);
        $input['f_es_bombeo']  = isset($request->f_es_bombeo) ? 1 : 0;
        $input['f_es_cloacal'] = isset($request->f_es_cloacal) ? 1 : 0;
        $input['f_es_defensa'] = isset($request->f_es_defensa) ? 1 : 0;
        $input['f_habilitada'] = 1;
        $estacion              = Estacion::create($input);

        // Si se cargo la foto de la estacion
        if($request->file('f_foto')) {
            $this->almacena_foto($estacion, 'f_foto', $request->file('f_foto'));
        }

        return redirect()->route('estaciones.index');
    }

    private function almacena_foto($estacion, $campo, $foto)
    {
        $name = $this->obtener_nombre($foto->extension());
        Image::make($foto)->resize(100, 100)->save($this->path . $name);
        $estacion[$campo] = $name;
        $estacion->save();
    }

    private function obtener_nombre($extension)
    {
        $cadena = explode('.', microtime());
        $cadena = explode(' ', $cadena[1]);
        $name   = $cadena[0] . $cadena[1] . '.' . $extension;
        return $name;
    }

    private function elimina_foto($name)
    {
        $archivo = $this->path . $name;
        if (file_exists($archivo)) {
            unlink($archivo);
        }
    }

    public function show($id)
    {
        $estacion = Estacion::where('f_idestacion', $id)->first();
        return view('estaciones.show', compact('estacion'));
    }

    public function edit($id)
    {
        $estacion = Estacion::where('f_idestacion', $id)->first();
        $municipios      = Municipio::all();
        return view('estaciones.edit', compact('estacion', 'municipios'));
    }

    public function update(Request $request, $id)
    {
        $estacion = Estacion::where('f_idestacion', $id)->update([
            'f_nombre'      => $request->f_nombre,
            'f_codestacion' => $request->f_codestacion,
            'f_direccion'   => $request->f_direccion,
            'f_situacion'   => $request->f_situacion,
            'f_lat'         => $request->f_lat,
            'f_lng'         => $request->f_lng,
            'f_es_bombeo'   => isset($request->f_es_bombeo) ? 1 : 0,
            'f_es_cloacal'  => isset($request->f_es_cloacal) ? 1 : 0,
            'f_es_defensa'  => isset($request->f_es_defensa) ? 1 : 0,
            'f_habilitada'  => isset($request->f_habilitada) ? 1 : 0,
            'f_idmunicipio' => $request->f_idmunicipio,
        ]);

        // Si se cargo la foto de la estacion
        if($request->file('f_foto')) {
            //Eliminar el archivo antes cargado
            if($estacion->f_foto) {
                $this->elimina_foto($estacion->f_foto);
            }
            $this->almacena_foto($estacion, 'f_foto', $request->file('f_foto'));
        }

        return redirect()->route('estaciones.index');
    }

    public function destroy(Request $request)
    {
        $estaciones = Estacion::whereIn('f_idestacion', $request->input('values'))->get();

        foreach ($estaciones as $estacion) {

            //Eliminar las fotos antes eliminarlas
            if($estacion->f_foto) {
                $this->elimina_foto($estacion->f_foto);
            }
        }

        Estacion::whereIn('f_idestacion', $request->input('values'))->delete();
        return response()->json([]);
    }

}
