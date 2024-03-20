<?php

namespace App\Http\Controllers;

use \App\Classes\Phpmodbus\ModbusMaster;
use App\Models\DataLogger;
use App\Models\Setting;

class LecturasController extends Controller
{
    public function index()
    {

        // $datalogger = DataLogger::find(2);
        // return $datalogger->f_EA3;

        $dataloggers = DataLogger::select('tbl_datalogger_electrotas.*', 'tbl_placas.f_nombre', 'tbl_estaciones.f_situacion')
            ->join('tbl_placas', 'tbl_placas.f_idplaca', '=', 'tbl_datalogger_electrotas.f_idplaca')
            ->join('tbl_estaciones', 'tbl_estaciones.f_idestacion', '=', 'tbl_placas.f_idestacion')
            ->orderBy('tbl_placas.f_nombre')
            ->get();
        return view('lecturas.index', compact('dataloggers'));
    }

    public function renderLecturas()
    {
        $dataloggers = $dataloggers = DataLogger::select('tbl_datalogger_electrotas.*', 'tbl_placas.f_nombre', 'tbl_estaciones.f_situacion')
            ->join('tbl_placas', 'tbl_placas.f_idplaca', '=', 'tbl_datalogger_electrotas.f_idplaca')
            ->join('tbl_estaciones', 'tbl_estaciones.f_idestacion', '=', 'tbl_placas.f_idestacion')
            ->orderBy('tbl_placas.f_nombre')
            ->get();
        $view = view('lecturas.datalogger', compact('dataloggers'))->render();
        return response()->json($view);
    }

    private function getData()
    {
        return DataLogger::select('tbl_datalogger_electrotas.*', 'tbl_placas.f_nombre', 'tbl_estaciones.f_situacion')
        ->join('tbl_placas', 'tbl_datalogger_electrotas.f_idplaca', '=', 'tbl_placas.f_idplaca')
        ->join('tbl_estaciones', 'tbl_estaciones.f_idestacion', '=', 'tbl_placas.f_idestacion')
        ->orderBy('tbl_placas.f_nombre')
        ->get();
    }

    private function setSetting($valor)
    {

        $setting                    = Setting::find(1);
        $setting->f_detenerlecturas = $valor;
        $setting->f_placasaleer     = 0;
        $setting->f_reintentos      = 0;
        $setting->f_iteracciones    = 0;
        $setting->save();
    }

    public function iniciarLecturas()
    {
        $this->setSetting(0);
        include public_path('conexion\lecturas.php');
        return response()->json(['message' => 'Lecturas iniciadas']);
    }

    public function detenerLecturas()
    {
        $this->setSetting(1);
        return response()->json(['message' => 'Lecturas detenidas']);
    }

    public function Modbus()
    {
        $ip = '127.0.0.1';

        // Create Modbus object
        $modbus = new ModbusMaster($ip, 'TCP');

        // Coils Boninas fisicas - Generalmente valores booleanos
        // Prefijos
        // 0 - Bobinas
        // 1 - Entradas discretas
        // 3 - Registro Entrada
        // 4 - Registros Retencion

        // Casi siempre se trabaja con el 3 ó 4

        //FC1 Read coils
        // try {
        //     // $recData = $modbus->readCoils($rec['DEVICE_ID'], $rec['REQUEST_START'], $rec['REQUEST_TOTAL']);
        //     $recData = $modbus->readCoils(1, 0, 10);
        //     if (is_array($recData)) {
        //         foreach ($recData as $k => $v) {
        //             $recData[$k] = (int) $v;
        //         }
        //     }
        // } catch (\\Exception $e) {
        //     // Print error information if any
        //      print date('Y-m-d H:i:s') . " FC1 Error conexion $ip ". $e->getMessage() ;
        //      return;
        //      exit();
        // }

        //FC2 Read input discretes
        // try {
        //     $recData = $modbus->readInputDiscretes(1, 0, 10);
        //     if (is_array($recData)) {
        //         foreach ($recData as $k => $v) {
        //             $recData[$k] = (int) $v;
        //         }
        //     }
        // } catch (\\Exception $e) {
        //     // Print error information if any
        //      print date('Y-m-d H:i:s') . " FC2 Error conexion $ip ". $e->getMessage() ;
        //      return;
        //      exit();
        // }

        //FC6 Write single register
        // try {

        //     // Posicion donde guardar o modificar
        //     $posicion = 50022;

        //     // Data to be writen
        //     $data_set  = [10, 15, 5.125];
        //     $dataTypes = ['INT', 'INT', 'WORD'];

        //     // Escribo los valores
        //     $recData = $modbus->writeMultipleRegister(1, $posicion, $data_set, $dataTypes);

        // } catch (\\Exception $e) {
        //     print date('Y-m-d H:i:s') . " Error conexion $ip " . $e->getMessage();
        //     return;
        //     exit();
        // }

        //FC3 Read holding registers
        // try {
        //     $recData = $modbus->readMultipleRegisters(1, 50022, 10);
        //     if (is_array($recData)) {
        //         foreach ($recData as $k => $v) {
        //             print $k . ' - ' . $v . ' <br>';
        //         }
        //     }

        // } catch (\\Exception $e) {
        //     // Print error information if any
        //     print date('Y-m-d H:i:s') . " FC3 Error conexion $ip " . $e->getMessage();
        //     return;
        //     exit();
        // }

    }

}
