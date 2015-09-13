<?php
require "vendor/autoload.php";

$url = 'http://localhost/book/post-form-page.php';
$data = ["email" => "lorna@example.com", "display_name" => "LornaJane"];

$client = new \GuzzleHttp\Client();
$page = $client->post($url, ["form_params" => $data]);
echo $page->getBody();

