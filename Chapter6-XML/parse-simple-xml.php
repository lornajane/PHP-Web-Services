<?php

$xml = new SimpleXMLElement(file_get_contents("sample.xml"));

echo("List of Hotels:\n");

foreach($xml->children() as $hotel) {
	echo $hotel['name'];
	echo " has " . $hotel->rooms . " rooms";
	echo " and costs " . $hotel->price. " EUR per night";
	echo "\n";
}


