<?php
// custom code for accessing the OSBS database
require("common.php");
function mapgetmarkersgbfsinformation()
{
   global $db;
   $jsoncontent=array();
   $result=$db->query("SELECT standId AS station_id, standName AS name, longitude AS lon, latitude AS lat FROM stands LEFT JOIN bikes on bikes.currentStand=stands.standId WHERE stands.serviceTag=0 GROUP BY standName ORDER BY standName");
   while($row = $result->fetch_assoc())
      {
      $jsoncontent[]=$row;
      }
   return $jsoncontent; n
}
function mapgetmarkersgbfsstatus()
{
   global $db;
   $jsoncontent=array();
   $time=time();
   $result=$db->query("SELECT standId AS station_id, count(bikeNum) AS num_bikes_available, null AS num_docks_available, 1 AS is_installed, 1 AS is_renting, 1 AS is_returning, $time AS last_reported FROM stands LEFT JOIN bikes on bikes.currentStand=stands.standId WHERE stands.serviceTag=0 GROUP BY standName ORDER BY standName");
   while($row = $result->fetch_assoc())
      {
      $jsoncontent[]=$row;
      }
   return $jsoncontent; 
}
