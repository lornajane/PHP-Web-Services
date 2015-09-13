<?php

$document = new SimpleXMLElement("<hotels />");

$kings = $document->addChild("hotel");
$kings->addAttribute("name", "Kings Hotel");
$kings->addChild("rooms", 12);
$kings->addChild("price", 150);

$queens = $document->addChild("hotel");
$queens->addAttribute("name", "Queens Hotel");
$queens->addChild("rooms", 17);
$queens->addChild("price", 150);

$grand = $document->addChild("hotel");
$grand->addAttribute("name", "Grand Hotel");
$grand->addChild("rooms", 27);
$grand->addChild("price", 100);

echo $document->asXML();