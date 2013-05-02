<?php

$url = 'http://localhost/book/post-form-page.php';
$data = array("email" => "lorna@example.com", "display_name" => "LornaJane");

$request = new HttpRequest($url, HTTP_METH_POST);
$request->setPostFields($data);
$request->send();
$page = $request->getResponseBody();
echo $page;

