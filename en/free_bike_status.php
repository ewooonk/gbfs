<?php



function freebike_status()

{

$myObj-> bikes = mapgetmarkersgbfsbikestatus();

$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $myObj;

$theJSON = json_encode($theObj);

$database = dirname(__FILE__) . "/free_bike_status.json";

file_put_contents($database, $theJSON);
}


?>
