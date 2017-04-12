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
            'location' => getenv('ENTRY_POINT'),
            'uri'      => getenv('ENTRY_POINT'),
            'trace'    => true
        ]);

        self::$instance = $this;
    }

    public function handle($function = 'teste',$params = [])
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