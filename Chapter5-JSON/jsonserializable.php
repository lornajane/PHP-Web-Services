<?php

class gardenObject implements JsonSerializable
{
	public function jsonSerialize() {
		unset($this->herbs);
		return $this;
	}
}

$garden = new gardenObject();
$garden->flowers = array("clematis", "geranium", "hydrangea");
$garden->herbs = array("mint", "sage", "chives", "rosemary");
$garden->fruit = array("apple", "rhubarb");

echo json_encode($garden);

// {"flowers":["clematis","geranium","hydrangea"],"fruit":["apple","rhubarb"]}