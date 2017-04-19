<?php

namespace SOAP\Server;

use SOAP\Server\RequestHandler;


class ServerDispatcher
{
    protected $server;

    public function __construct()
    {
        try{
            $this->server = new \SoapServer(null,[
                'uri' => env('ENTRY_POINT'),
                'soap_version' => SOAP_1_2
            ]);
            $this->server->setClass(RequestHandler::class);
            $this->server->handle();
        }catch(SoapFault $fault){
            print $fault->getMessage();
        }

        self::$instance = $this;
    }


    //Isso não foi utilizado
//    public function __call($name,$arguments)
//    {
//        return call_user_func([RequestHandler::class,$name],$arguments);
//    }
}