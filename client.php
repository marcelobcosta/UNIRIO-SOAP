<?php
    require_once 'init.php';

    $dispatcher = new \SOAP\Client\ClientDispatcher();

    //Melhorar isso
    $function = $_GET['f'];
    $params = $_GET;
    unset($params['f']);

    $dispatcher->handle($function,$params);

    var_dump($dispatcher->getReturn());