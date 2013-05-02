<?php

try {
    $client = new SoapClient("http://localhost/book/wsdl");
    $dwarves = $client->getDwarves();
    var_dump($dwarves);
} catch (SoapFault $e) {
    var_dump($e);
}
