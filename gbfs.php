<?php

function gbfs()

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

$system_information->name = "system_information";
$system_information->url = "https://www.cykl.nl/gbfs/en/system_information.json";
$station_information->name = "station_information";
$station_information->url = "https://www.cykl.nl/gbfs/en/station_information.json";
$station_status->name = "station_status";
$station_status->url = "https://www.cykl.nl/gbfs/en/station_status.json";
$system_pricing_plans->name = "system_pricing_plans";
$system_pricing_plans->url = "https://www.cykl.nl/gbfs/en/system_pricing_plans.json";

$en-> feeds = array($system_information,$station_information,$station_status,$system_pricing_plans);
$myJSON = json_encode($myObj);
$data-> en = $en;

$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $data;

$theJSON = json_encode($theObj);

// echo $theJSON;

json_write_gbfs ($theJSON);

}


function json_write_gbfs ($theJSON)
{
	$database = dirname(__FILE__) . "/gbfs.json";

	file_put_contents($database, $theJSON);
}

?>