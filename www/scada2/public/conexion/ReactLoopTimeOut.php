<?php

require __DIR__ . '/../../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface;
use React\Http\Browser;
use React\Promise\Timer;

$loop   = React\EventLoop\Loop::get();
$client = new Browser($loop);

$arrPlacasIP = [
    '10.11.23.4',
    '10.11.23.9',
    '10.11.23.69',
    '10.11.23.166',
    '10.11.22.70',
    '10.11.23.228',
    '10.11.23.212',
    '10.11.23.251',
    '10.11.24.67',
    '10.11.24.135',
    '10.11.22.189',
    '10.11.25.12',
    '10.11.23.202',
    '10.11.22.206',
    '10.11.24.24',
    '10.11.27.2',
    '10.11.25.29'];

$iteraciones = 0;

$loop->addPeriodicTimer(5, function (\React\EventLoop\TimerInterface $timer) use ($client, $arrPlacasIP, &$iteraciones, &$loop) {

    if($iteraciones > 100) {
        $loop->cancelTimer($timer);
    }

    foreach ($arrPlacasIP as $placaIP) {

        $url = "http://scada:3L3ctrota5@$placaIP/status.xml";

        Timer\timeout(
            $client->get($url)->then(
                function (ResponseInterface $response) use ($url) {
                    $xml = new SimpleXMLElement($response->getBody());
                    print $url . ' : ' . $xml->pot2 . " \n";
                },
                function (Exception $exception) use ($url) {
                    print $url . ' : ' . $exception->getMessage() . " \n";
                }
            ), 5.0);

        $iteraciones++;
    }
});

$loop->run();
