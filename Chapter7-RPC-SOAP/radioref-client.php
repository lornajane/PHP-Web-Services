<?php

ini_set("soap.wsdl_cache_enabled", "0");
$client = new SoapClient('http://api.radioreference.com/soap2/?wsdl&v=latest');
/*
print_r($client->__getFunctions());
exit;
 */

$countries = $client->getCountryList();
print_r($countries);
