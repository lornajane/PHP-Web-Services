<?php

require "vendor/autoload.php";

$url = "http://requestb.in/149njzd1";
//$url = "http://requestb.in/example";
$data = array("name" => "Lorna", "email" => "lorna@example.com");

$client = new \GuzzleHttp\Client();

$result = $client->post($url, ["json" => $data]);

echo $result->getBody();

