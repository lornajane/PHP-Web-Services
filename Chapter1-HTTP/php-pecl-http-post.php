<?php

$url = "http://requestb.in/example";

$data = array("name" => "Lorna", "email" => "lorna@example.com");

$request = new HTTPRequest($url, HTTP_METH_POST);
$request->setPostFields($data);
$request->setHeaders(array("Content-Type" => "application/javascript"));

$request->send();
$result = $request->getResponseBody();

var_dump($result);
