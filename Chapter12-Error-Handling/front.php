<?php

require "accept.php";

spl_autoload_register(function ($classname) {
    require ("inc/" . strtolower($classname) . ".php");
});

// create the correct view format
$accepted_formats = parseAcceptHeader();
$supported_formats = array("application/json", "application/xml");
foreach($accepted_formats as $format) {
    if(in_array($format, $supported_formats)) {
        // yay, use this format
        break;
    }
}

switch($format) {
    case "application/xml":
        $view = new XmlView();
        break;
    case "application/json":
    default:
        $view = new JsonView();
        break;
}


set_exception_handler(function ($exception) use ($view) {
    $data = array("message" => $exception->getMessage());
    if($exception->getCode()) {
        $view->status = $exception->getCode();
    } else {
        $view->status = 500;
    }
    $view->render($data);
});

// allowed controllers
$controllers = array("user", "post", "category");

// parse URL, first is class, then function
$pieces = explode('/', $_SERVER['PATH_INFO']);
if(in_array($pieces[1], $controllers)) {
    $classname = $pieces[1];
    $functionname = $pieces[2];

    $class = new $classname();
    $data = $class->$functionname();

    $view->render($data);
} else {
    throw new Exception("request not recognised", 400);
}
