<?php

ini_set("soap.wsdl_cache_enabled", "0");

try {
    $client = new SoapClient("http://localhost:8080/wsdl");
    $events = $client->getEvents();
    print_r($events);
} catch (SoapFault $e) {
    var_dump($e);
}

