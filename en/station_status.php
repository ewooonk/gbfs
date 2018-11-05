<?php



function station_status()

{

$myObj-> stations = mapgetmarkersgbfsstatus();

$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $myObj;

$theJSON = json_encode($theObj);

$database = dirname(__FILE__) . "/station_status.json";

file_put_contents($database, $theJSON);
}


?>