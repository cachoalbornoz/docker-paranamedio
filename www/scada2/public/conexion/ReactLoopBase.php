<?php

require  __DIR__ . '/../../vendor/autoload.php';

use GuzzleHttp\Client;

$loop = React\EventLoop\Loop::get();

$client = new Client(['base_uri' => 'http://45.224.188.130:8080/api/']);

$arrPlacas = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16'];

// Function to fetch ElectroTas data

$iteraciones = 0;
$placaId     = 5;

$loop->addPeriodicTimer(5, function (\React\EventLoop\TimerInterface $timer) use ($client, $placaId, &$iteraciones, &$loop) {

    if($iteraciones == 5) {
        $loop->cancelTimer($timer);
    }

    try {

        $res        = $client->request('GET', "v1/logger/status/$placaId", ['query' => []]);
        $body       = $res->getBody();
        $array_body = json_decode($body);
        print($placaId);
        print(' ');
        print_r($array_body);

        $iteraciones++;

    } catch (\Throwable $th) {
        print_r($th->getMessage());
    }

});


$loop->run();
