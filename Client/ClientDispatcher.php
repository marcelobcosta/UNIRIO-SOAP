<?php
/**
 * Created by PhpStorm.
 * User: marcelobrunocostaesilva
 * Date: 12/04/17
 * Time: 16:40
 */

namespace SOAP\Client;


class ClientDispatcher
{
    private static $instance;
    protected $client;
    protected $return;

    public function __construct()
    {
        $this->client = new \SoapClient(null, [
            'location' => env('ENTRY_POINT'),
            'uri'      => env('ENTRY_POINT'),
            'trace'    => true,
            'soap_version' => SOAP_1_2
        ]);

        self::$instance = $this;
    }

    public function handle()
    {
        $function = $_GET['f'];

        $params = $_GET;
        unset($params['f']);

        try {
            $this->return = $this->client->__soapCall($function, $params);
        }catch(\Exception $e){
            // Deu ruim
        }

        if(env('DEBUG_MODE',false)){
            // Dump Request
            var_dump($this->client->__getLastRequest());

            // Dump Response
            var_dump($this->client->__getLastResponse());

        }
    }

    public function rawHandle($function,$params = [])
    {
        $this->return = $this->client->__soapCall($function,$params);
    }

    public function getReturn()
    {
        return $this->return;
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}