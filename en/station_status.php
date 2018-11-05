<?php



function station_status()

{

$stationsObj-> stations = mapgetmarkersgbfsstatus();

$statObj->ttl = 60;
$statObj->last_updated = time();
$statObj->data = $stationsObj;

$statJSON = json_encode($statObj);

$database = dirname(__FILE__) . "/station_status.json";

file_put_contents($database, $statJSON);
}


?>
