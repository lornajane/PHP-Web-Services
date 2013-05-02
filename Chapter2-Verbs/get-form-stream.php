<?php

$url = 'http://localhost/book/get-form-page.php';
$data = array("category" => "technology", "rows" => 20);

$get_addr = $url . '?' . http_build_query($data);
$page = file_get_contents($get_addr);
echo $page;

