<?php

$url = 'http://localhost/book/user-agent.php';
$options = array(
    "http" => array(
        "header"  => "User-Agent: Advanced HTTP Magic Client"
    )
);

$page = file_get_contents($url, NULL, stream_context_create($options));
echo $page;

