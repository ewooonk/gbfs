<?php

function system_information ()
{
    

$datObj->system_id = "CKL";
$datObj->language = "en";
$datObj->name = "Cykl";
$datObj->short_name = "Cykl";
$datObj->operator = "Cykl";
$datObj->url = "https://www.cykl.nl/";
$datObj->purchase_url = "https://www.cykl.nl/";
$datObj->start_date = "2017-07-01";
$datObj->phone_number = "+316-208-554-89";
$datObj->email = "support@cykl.nl";
$datObj->timezone = "Europe/Amsterdam";
$datObj->type_of_system = "virtual_station_based";

$datJSON = json_encode($datObj);

$sysInfObj->ttl = 60;
$sysInfObj->last_updated = time();
$sysInfObj->data = $datObj;

$sysInfJSON = json_encode($sysInfObj);

// echo $theJSON;

json_write_system_information ($sysInfJSON);

}

function json_write_system_information ($sysInfJSON)
{
	$database = dirname(__FILE__) . "/system_information.json";

	file_put_contents($database, $sysInfJSON);
}

?>
