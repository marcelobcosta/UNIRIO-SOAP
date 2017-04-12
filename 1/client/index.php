<?php

//Init

set_include_path(__DIR__.'/../../');

require_once 'vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__.'/../../');
$dotenv->load();

//Testando

$client = new SoapClient(null, [
    'location' => getenv('ENTRY_POINT'),
    'uri'      => getenv('ENTRY_POINT'),
    'trace'    => true
]);

echo $return = $client->__soapCall("teste",array("world"));