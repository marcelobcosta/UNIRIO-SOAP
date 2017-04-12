<?php
namespace SOAP\Server;

class RequestHandler
{
    public function teste($id)
    {
        return 'WOW'.$id;
    }
}