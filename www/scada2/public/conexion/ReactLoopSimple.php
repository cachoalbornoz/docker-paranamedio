<?php

require  __DIR__ . '/../../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;

$loop   = React\EventLoop\Loop::get();
$client = new Browser($loop);

$arrPlacasId = ['1', '2', '3', '4', '5'];

$loop->addPeriodicTimer(10, function () use ($arrPlacasId, $client) {

    foreach ($arrPlacasId as $placaId) {

        $client->get("http://45.224.188.130:8080/api/v1/logger/status/$placaId")
            ->then(
                function (ResponseInterface $response) {
                    print_r(json_decode($response->getBody()));
                },
                function (Exception $exception) {
                    print $exception->getMessage();
                }
            );

    }

});

$loop->run();
