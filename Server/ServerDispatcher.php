<?php
/**
 * Created by PhpStorm.
 * User: marcelobrunocostaesilva
 * Date: 12/04/17
 * Time: 16:42
 */

namespace SOAP\Server;


class ServerDispatcher
{
    private static $instance;
    protected $server;

    public function __construct()
    {
        try{
            $this->server = new \SoapServer(null,[ 'uri' => getenv('ENTRY_POINT')]);
            $this->server->setClass(\SOAP\Server\RequestHandler::class);
            $this->server->handle();
        }catch(SoapFault $fault){
            print $fault->getMessage();
        }

        self::$instance = $this;
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}