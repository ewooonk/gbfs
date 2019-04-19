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
      $row[lat]=(float)$row[lat];
      $row[lon]=(float)$row[lon];          
      $jsoncontent[]=$row;
      }
   return $jsoncontent; // TODO proper response function
}
function mapgetmarkersgbfsstatus()
{
   global $db;
   $jsoncontent=array();
   $time=time();
   $result=$db->query("SELECT standId AS station_id, count(bikeNum) AS num_bikes_available, null AS num_docks_available, 1 AS is_installed, 1 AS is_renting, 1 AS is_returning, $time AS last_reported FROM stands LEFT JOIN bikes on bikes.currentStand=stands.standId WHERE stands.serviceTag=0 GROUP BY standName ORDER BY standName");
   while($row = $result->fetch_assoc())
      {
      $row[num_bikes_available]=(int)$row[num_bikes_available];      
      $row[is_installed]=(int)$row[is_installed];
      $row[is_renting]=(int)$row[is_renting];
      $row[is_returning]=(int)$row[is_returning];
      $row[last_reported]=(int)$row[last_reported];
      $jsoncontent[]=$row;
      }
   return $jsoncontent; // TODO proper response function
}
function mapgetmarkersgbfsbikestatus()
{
   global $db;
   $jsoncontent=array();
   $result=$db->query("SELECT bikes.bikeNum AS bike_id,stands.latitude AS lat, stands.longitude AS lon FROM bikes  LEFT JOIN stands on bikes.currentStand=stands.standId LEFT JOIN notes on bikes.bikeNum=notes.bikeNum WHERE currentUser IS NULL GROUP BY bikes.bikeNum");
     //$result=$db->query("SELECT standId,count(bikeNum) AS bikecount,standDescription,standName,standPhoto,standExplore,standLink, longitude AS lon, latitude AS lat FROM stands LEFT JOIN bikes on bikes.currentStand=stands.standId WHERE stands.serviceTag=0 GROUP BY standName ORDER BY standName");
   while($row = $result->fetch_assoc())
      {
     // echo $row["bikeNum"];
     $bikenum = $row["bike_id"];
      $result2=$db->query("SELECT note FROM notes WHERE bikeNum='$bikenum' AND deleted IS NULL ORDER BY time DESC");
      $row[lat]=(float)$row[lat];
      $row[lon]=(float)$row[lon];
      $row["is_reserved"]=0; 
      $note="";
      while ($row2=$result2->fetch_assoc())
         {
         $note.=$row2["note"]."; ";
        }
       if($note) $row["is_disabled"]=1;
       else $row["is_disabled"]=0;
      $jsoncontent[]=$row;
      }
   return $jsoncontent; // TODO proper response function
}
