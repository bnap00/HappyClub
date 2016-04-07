<?php
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["event_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
echo $EventID = $_REQUEST['id'];
$title = $_REQUEST['eventtitle'];
$name = $_REQUEST['eventname'];
$desc = $_REQUEST['eventdesc'];
$path="../eventImg/";
 $moveResult =move_uploaded_file($_FILES['EventImage']["tmp_name"],$path.$EventID.".jpg");
    if ($moveResult == true) {
        $EventUpdate = dbLayer:: AllUpdateEvent($EventID,$name,$title,$desc,1);
       
    }
    else {
        $image=$_REQUEST['image'];
         $EventUpdate = dbLayer:: AllUpdateEvent($EventID,$name,$title,$desc,$image);
    }



?>

