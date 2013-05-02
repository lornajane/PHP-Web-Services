<?php

$options = array("location" => "http://localhost/book/soap-server.php",
    "uri" => "http://localhost");

try {
    $client = new SoapClient(null, $options);
    $dwarves = $client->getDwarves();
    var_dump($dwarves);
} catch (SoapFault $e) {
    var_dump($e);
}
