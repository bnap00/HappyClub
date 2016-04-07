<?php
include './header.php';
require './DbLayer.php';
if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
 $title =  $_REQUEST["eventtitle"];
  $name =  $_REQUEST["eventname"];
  $desc = $_REQUEST["eventdesc"];
  $startdate = $_REQUEST["startdate"];
  $enddate = $_REQUEST["enddate"];
$eventid = dbLayer::InsertEvent($name,$startdate,$enddate,$title,$desc);

chdir("../");
$message = "New Event Added";
include './gcm/sendMulticast.php';
 $path="./eventImg/";
 $moveResult =move_uploaded_file($_FILES['EventImage']["tmp_name"],$path.$eventid.".jpg");
    if ($moveResult == true) {
        $image="1";
       dbLayer::UpdateEvent($image,$eventid);
        
    }
    else {
         //echo "ERROR: File not moved correctly";
    }
    echo "Insert Successfull <a href='addEvent.php'> Go Back</a>";
    include './admin/footer.php';
    