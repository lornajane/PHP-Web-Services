<?php

$url = "http://requestb.in/149njzd1";
//$url = "http://requestb.in/example";
$data = array("name" => "Lorna", "email" => "lorna@example.com");

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_HTTPHEADER, 
    array('Content-Type: application/json')
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

var_dump($result);
