<?php
error_reporting(E_ALL);
echo '<h1>Comunicación TCP con placa de Telemetría utilizando PHP a través de sockets</h1>';
echo '<hr>';

// Configuración de la conexión TCP
$ip = '10.11.24.135';  // Golf
// $ip = '10.11.23.212';  // Puerto Viejo

$puerto = 9760;  // Puerto TCP de la placa
$comando = "O81";  // Comando a enviar (OUTPUT salida 8 con valor 1)

// Crear el socket TCP
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "Error al crear el socket: " . socket_strerror(socket_last_error()) . "\n";
	exit;
}

// Conectar al servidor
$resultado = socket_connect($socket, $ip, $puerto);
if ($resultado === false) {
	echo "Error al conectar al servidor: " . socket_strerror(socket_last_error($socket)) . "\n";
	exit;
}

// Enviar el comando al servidor
socket_write($socket, $comando, strlen($comando));

// Leer la respuesta del servidor
$respuesta = socket_read($socket, 10240);  // Lee hasta 1024 bytes de datos

echo $respuesta;

// Cerrar el socket
socket_close($socket);

return 0;
