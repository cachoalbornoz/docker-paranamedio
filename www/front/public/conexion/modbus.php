<?php

$ip        = '127.0.0.1';
$puerto    = '502';
$protocolo = 'TCP';

require_once dirname(__FILE__) . '/phpmodbus-master/Phpmodbus/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster($ip, $protocolo);

try {
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
    // } catch (Exception $e) {
    //     // Print error information if any
    //     print date('Y-m-d H:i:s') . " FC1 Error: {$modbus} {$e}\n" ;
    // }

    //FC2 Read input discretes
    // try {
    //     $recData = $modbus->readInputDiscretes(1, 0, 10);
    //     if (is_array($recData)) {
    //         foreach ($recData as $k => $v) {
    //             $recData[$k] = (int) $v;
    //         }
    //     }
    // } catch (Exception $e) {
    //     // Print error information if any
    //     print date('Y-m-d H:i:s') . " FC1 Error: {$modbus} {$e}\n" ;
    // }

    //FC3 Read holding registers
    try {
        $recData = $modbus->readMultipleRegisters(1, 0, 10);
        print_r($recData);

    } catch (Exception $e) {
        // Print error information if any
        print date('Y-m-d H:i:s') . " FC1 Error: {$modbus} {$e}\n";
    }

    //FC6 Write single register
    try {

        // Pongo de ejemplo valor 3 en el dato a guardar - Data_set
        $data_set = [3];

        // Defino tipo de dato
        $dataTypes = ['INT'];

        $swapregs = false;

        // Posicion donde guardar o modificar
        $posicion = 1;

        $recData = $modbus->writeMultipleRegister(1, $posicion, $data_set, $dataTypes);

        // Mostrar el valor guardado

        $recData = $modbus->readMultipleRegisters(1, 0, 10);
        print_r($recData);

    } catch (Exception $e) {
        // Print error information if any
        $rec['LOG'] = date('Y-m-d H:i:s') . " FC6 Error: {$modbus} {$e}\n" . $rec['LOG'];
    }

} catch (Exception $e) {
    // Print error information if any
    print $modbus;
    print $e;
    exit;
}
