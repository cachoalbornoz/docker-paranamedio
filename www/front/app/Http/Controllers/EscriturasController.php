<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

class EscriturasController extends Controller
{

    public function index()
    {
        return view('escrituras.index');

    }

    public function encender(Request $request)
    {
        // $ip = '10.11.23.228';  // A.S.S.V.E.R
        // $ip = '10.11.24.135';  // Golf
        $ip     = '10.11.23.212';  // Puerto Viejo
        $puerto = 9760;
        $cmd    = 'O81';

        if($this->check($ip) == 1) {
            return 'Ya se encuentra encendido';
        }

        return $this->conectar($ip, $puerto, $cmd);
    }

    public function apagar(Request $request)
    {
        $ip     = '10.11.23.212';
        $puerto = 9760;
        $cmd    = 'O80';

        if($this->check($ip) == 0) {
            return 'Ya se encuentra apagado';
        }

        return $this->conectar($ip, $puerto, $cmd);
    }

    private function conectar($ip, $puerto, $cmd)
    {
        try {

            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if ($socket === false) {
                return 'socket_create() failed: reason: ' . socket_strerror(socket_last_error()) . "\n";
            }
            $result = socket_connect($socket, $ip, $puerto);
            if ($result === false) {
                return "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
            }
            socket_write($socket, $cmd, strlen($cmd));
            // Read and output possible response from the command sent

            $status = ($this->check($ip) == 1) ? 'encendido' : 'apagado';

            socket_close($socket);

            return ' Estado ' . $status;

        } catch (\Exception $e) {
            // catch error message
            // Log::info($e->getMessage());
            return $e->getMessage();
        }
    }

    private function check($ip)
    {
        $url = "http://scada:3L3ctrota5@$ip/status.xml";
        $client = new Client();
        $res    = $client->request('GET', $url);
        $xml    = new SimpleXMLElement($res->getBody());
        return $xml->led7;
    }

}
