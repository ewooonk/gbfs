<?php

require $_SERVER['DOCUMENT_ROOT'] . "/config.php";
require $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
require $_SERVER['DOCUMENT_ROOT'] . "/actions-gbfs.php";

$db=new Database($dbserver,$dbuser,$dbpassword,$dbname);
$db->connect();

require $_SERVER['DOCUMENT_ROOT'] . "/gbfs/gbfs.php";
require $_SERVER['DOCUMENT_ROOT'] . "/gbfs/en/system_information.php";
require $_SERVER['DOCUMENT_ROOT'] . "/gbfs/en/station_information.php";
require $_SERVER['DOCUMENT_ROOT'] . "/gbfs/en/station_status.php";
require $_SERVER['DOCUMENT_ROOT'] . "/gbfs/en/system_pricing_plans.php";

gbfs();
system_information ();
station_information();
station_status();
system_pricing_plans();


echo "succes";
return "succes";


?>