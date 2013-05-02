<?php

// php2wsdl from phpclasses.org
require("php2wsdl/WSDLCreator.php");

$wsdlgen = new WSDLCreator("LibraryWSDL", "http://localhost/book/wsdl");
$wsdlgen->addFile("library2.php");
$wsdlgen->addURLToClass("Library", "http://localhost/book/soap-server2.php");

$wsdlgen->createWSDL();
$wsdlgen->saveWSDL("wsdl");
