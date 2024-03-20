<?php

require __DIR__ . '/../../vendor/autoload.php';

use React\EventLoop\Loop;
use React\Socket\ConnectionInterface;
use React\Socket\Connector;

$loop      = Loop::get();
$connector = new Connector();

// Configuración de la conexión TCP

$puerto = 9760;  // Puerto TCP de la placa

// Comando a enviar (OUTPUT salida 8 con valor 1) - Leer parametro
$comando = ($argv[1] == 'encender') ? 'O81' : 'O80';

$comandoTxt = ($argv[1] == 'encender') ? 'encender' : 'apagar';

// $ip = '10.11.23.228';  // A.S.S.V.E.R
// $ip = '10.11.24.135';  // Golf
$ip = '10.11.23.212';  // Puerto Viejo

print 'Enviando ' . $comandoTxt . ' a la IP ' . $ip;

// $connector->connect($ip . ':' . $puerto)->then(
//     function (ConnectionInterface $connection) use ($comando) {
//         $connection->write($comando);
//     },
//     function ($error) {
//         $this->error("Connection error: {$error->getMessage()}");
//     }
// );

$timeoutConnector = new React\Socket\TimeoutConnector($connector, 1.0);

$timeoutConnector->connect($ip . ':' . $puerto)->then(
    function (React\Socket\ConnectionInterface $connection) use ($comando) {
        $connection->write($comando);
        print 'Enviado ' ;
    },
    function ($error) {
        $this->error("Connection error: {$error->getMessage()}");
    }
);

