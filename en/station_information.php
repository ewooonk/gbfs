<?php

function station_information()

{

$stationsObj-> stations = mapgetmarkersgbfsinformation();

$infObj->ttl = 60;
$infObj->last_updated = time();
$infObj->data = $stationsObj;

$infJSON = json_encode($infObj);

// echo $theJSON;
json_write_station_information ($infJSON);

}

function json_write_station_information ($infJSON)
{
	$database = dirname(__FILE__) . "/station_information.json";

	file_put_contents($database, $infJSON);
}





?>
