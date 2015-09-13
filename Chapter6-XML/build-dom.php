<?php

$document = new DOMDocument();
$hotels = $document->createElement('hotels');
$document->appendChild($hotels);

$kings = $document->createElement("hotel");
$name = $document->createAttribute('name');
$name->value = "Kings Hotel";
$kings->appendChild($name);
$rooms = $document->createElement("rooms", 12);
$kings->appendChild($rooms);
$price = $document->createElement("price", 150);
$kings->appendChild($price);

$hotels->appendChild($kings);

$queens = $document->createElement("hotel");
$name = $document->createAttribute('name');
$name->value = "Queens Hotel";
$queens->appendChild($name);
$rooms = $document->createElement("rooms", 17);
$queens->appendChild($rooms);
$price = $document->createElement("price", 150);
$queens->appendChild($price);

$hotels->appendChild($queens);

$grand = $document->createElement("hotel");
$name = $document->createAttribute('name');
$name->value = "Grand Hotel";
$grand->appendChild($name);
$rooms = $document->createElement("rooms", 27);
$grand->appendChild($rooms);
$price = $document->createElement("price", 100);
$grand->appendChild($price);

$hotels->appendChild($grand);

echo $document->saveXML();