<?php

$url = "http://requestb.in/149njzd1";
//$url = "http://requestb.in/example";
$data = array("name" => "Lorna", "email" => "lorna@example.com");

$context = stream_context_create(array(
    'http' => array(
        'method' => 'POST',
        'header' => array('Accept: application/json',
            'Content-Type: application/json'),
        'content' => json_encode($data)
    )
));

$result = file_get_contents($url, false, $context);
echo $result;

