<?php

require __DIR__ . '/../../vendor/autoload.php';


$DEBUG=1;

$puerto = 9760;
if(!isset($argv[1])) {
    $cmd    = 'O81';
    $comandoTxt = 'encender';
} else {
    $cmd    = ($argv[1] == 'encender') ? 'O81' : 'O80';
    $comandoTxt = ($argv[1] == 'encender') ? 'encender' : 'apagar';
}
// $ip = '10.11.23.228';  // A.S.S.V.E.R
// $ip = '10.11.24.135';  // Golf
$ip = '10.11.23.212';  // Puerto Viejo

print 'Enviando ' . $comandoTxt . ' a la IP ' . $ip;


$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
} else {
    if ($DEBUG) print "Socket created successfully\n";
    $result = socket_connect($socket, $ip, $puerto);
    if ($result === false) {
        echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    } else {
        if ($DEBUG) print "Connected successfully\n";
        socket_write($socket, $cmd, strlen($cmd));
        // //Read and output possible response from the command sent
        sleep(3);

    }
    socket_close($socket);
}

if ($DEBUG) print "The end.\n";
