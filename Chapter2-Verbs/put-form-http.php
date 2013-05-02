<?php

$url = 'http://localhost/book/put-form-page.php';
$data = array("email" => "lorna@example.com", "display_name" => "LornaJane");

$request = new HttpRequest($url, HTTP_METH_PUT);
$request->setHeaders(array("Content-Type" => "application/x-www-form-urlencoded"));
$request->setPutData(http_build_query($data));
$request->send();
$page = $request->getResponseBody();
echo $page;

