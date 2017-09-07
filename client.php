<?php
    require_once 'init.php';

    $dispatcher = new \SOAP\Client\ClientDispatcher();

    $dispatcher->handle();

    var_dump($dispatcher->getReturn());

    exit;
