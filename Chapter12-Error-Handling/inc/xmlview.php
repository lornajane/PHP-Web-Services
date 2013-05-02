<?php

class XmlView
{
    public function render($data) {
        header('Content-Type: text/xml; charset=utf8');
        $xml = new SimpleXMLElement("<response />");
        $xml = $this->formatData($xml, $data);
        echo $xml->asXml();

    }

    protected function formatData($xml, $data) {
        foreach($data as $field => $value) {
            if(is_array($value)) {
                $child = $xml->addChild($field);
                $this->formatData($child , $value);
            } else {
                $xml->addChild($field, $value);
            }
        }
        return $xml;
    }
}
