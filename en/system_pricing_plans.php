<?php

function system_pricing_plans()
{

$standard->plan_id = "CYKL_STD";
$standard->url = "https://www.cykl.nl";
$standard->name = "Cykl standard";
$standard->currency = "EUR";
$standard->price = 0.50;
$standard->is_taxable = 0;
$standard->desciption = "The standard fee applies to each started timeslot of 20 minutes.";

$halfday->plan_id = "CYKL_HLD";
$halfday->url = "https://www.cykl.nl";
$halfday->name = "Cykl 12-hour cap";
$halfday->currency = "EUR";
$halfday->price = 3.00;
$halfday->is_taxable = 0;
$halfday->desciption = "The maximum fee for a rental period of 12 hours is capped at the given amount.";

$wday->plan_id = "CYKL_WLD";
$wday->url = "https://www.cykl.nl";
$wday->name = "Cykl 24-hour cap";
$wday->currency = "EUR";
$wday->price = 4.00;
$wday->is_taxable = 0;
$wday->desciption = "The maximum fee for a rental period of 24 hours is capped at the given amount.";

$plans->plans = array($standard,$halfday,$wday);


$theObj->ttl = 60;
$theObj->last_updated = time();
$theObj->data = $plans;

$theJSON = json_encode($theObj);

// echo $theJSON;

json_write_system_pricing_plans ($theJSON);

}


function json_write_system_pricing_plans ($theJSON)
{
	$database = dirname(__FILE__) . "/system_pricing_plans.json";

	file_put_contents($database, $theJSON);
}

?>


