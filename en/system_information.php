<?php

function system_information ()
{
    

$myObj->system_id = "CKL";
$myObj->language = "en";
$myObj->name = "Cykl";
$myObj->short_name = "Cykl";
$myObj->operator = "Cykl";
$myObj->url = "https://www.cykl.nl/";
$myObj->purchase_url = "https://www.cykl.nl/";
$myObj->start_date = "2017-07-01";
$myObj->phone_number = "+316-208-554-89";
$myObj->email = "support@cykl.nl";
$myObj->timezone = "Europe/Amsterdam";
$myObj->type_of_system = "virtual_station_based";

$myJSON = json_encode($myObj);

$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $myObj;

$theJSON = json_encode($theObj);

// echo $theJSON;

json_write_system_information ($theJSON);

}

function json_write_system_information ($theJSON)
{
	$database = dirname(__FILE__) . "/system_information.json";

	file_put_contents($database, $theJSON);
}

?>