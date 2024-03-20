<?php

require __DIR__ . '/../../vendor/autoload.php';

use React\Socket\ConnectionInterface;
use React\Socket\Connector;

$connector = new Connector();

$DEBUG=1;

$puerto = 9760;
if(!isset($argv[1])) {
    $comando    = 'O81';
    $comandoTxt = 'encender';
} else {
    $comando    = ($argv[1] == 'encender') ? 'O81' : 'O80';
    $comandoTxt = ($argv[1] == 'encender') ? 'encender' : 'apagar';
}
// $ip = '10.11.23.228';  // A.S.S.V.E.R
// $ip = '10.11.24.135';  // Golf
$ip = '10.11.23.212';  // Puerto Viejo

print 'Enviando ' . $comandoTxt . ' a la IP ' . $ip;

$connector->connect($ip . ':' . $puerto)->then(
    function (ConnectionInterface $connection) use ($comando) {

        $connection->write($comando);
        print ' Enviado';
        sleep(3);

    },
    function (\Exception $e) {
        print $e->getMessage();
    }
);
