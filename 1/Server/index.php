<?php

//Entry Point

set_include_path(__DIR__.'/../../');

require_once 'vendor/autoload.php';

require_once 'lib/nusoap.php';

$dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
$dotenv->load();

require 'RequestHandler.php';

//Testando

try{
    $server = new SoapServer(null,[ 'uri' => getenv('ENTRY_POINT')]);
    $server->setClass(\SOAP\Server\RequestHandler::class);
    $server->handle();
}catch(SoapFault $fault){
    print $fault->getMessage();
}