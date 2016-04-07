<?php
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["event_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
$EventID = $_REQUEST['id'];

       if(dbLayer:: DeleteEventdetails($EventID)){
           $path ="../eventImg/$EventID.jpg";
           if(file_exists($path)){
                unlink($path);
               
           
           }
           echo "Successfull";
       }
       else{
           echo "Error";
       }
       include './footer.php';

?>

