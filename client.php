<?php
    require_once 'init.php';

    $dispatcher = new \SOAP\Client\ClientDispatcher();

    $dispatcher->handle($function,$params);

    var_dump($dispatcher->getReturn());

    exit;