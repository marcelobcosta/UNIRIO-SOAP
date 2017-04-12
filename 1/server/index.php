<?php

//Entry Point

set_include_path(__DIR__);

require_once '../../vendor/autoload.php';

require_once '../../lib/nusoap.php';

function test($id){
	return 'Ai jesus to printando: '.$id;
}

$server = new soap_server();
$server->register('test');
$server->service($HTTP_RAW_POST_DATA);