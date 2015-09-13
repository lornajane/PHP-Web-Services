<?php

$url = 'http://localhost/book/post-form-page.php';
$data = ["email" => "lorna@example.com", "display_name" => "LornaJane"];
$options = ["http" => 
    ["method"  => "POST",
        "header"  => "Content-Type: application/x-www-form-urlencoded",
        "content" => http_build_query($data)
    ]
];

$page = file_get_contents($url, NULL, stream_context_create($options));
echo $page;

