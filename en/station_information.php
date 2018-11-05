<?php

function station_information()

{

$myObj-> stations = mapgetmarkersgbfsinformation();

$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $myObj;

$theJSON = json_encode($theObj);

// echo $theJSON;
json_write_station_information ($theJSON);

}

function json_write_station_information ($theJSON)
{
	$database = dirname(__FILE__) . "/station_information.json";

	file_put_contents($database, $theJSON);
}





?>