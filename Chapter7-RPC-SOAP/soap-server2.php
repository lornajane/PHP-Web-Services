<?php

require('library.php');

$server = new SoapServer("wsdl"); // wsdl file name
$server->setClass('Library');
$server->handle();
