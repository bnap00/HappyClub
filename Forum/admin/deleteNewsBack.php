<?php
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
$NewsID = $_REQUEST['id'];

       if(dbLayer:: DeleteNewsdetails($NewsID)){
           if(unlink("../newsImg/$NewsID.jpg")){
               
           }
           echo "Successfull<a href=viewNews.php>Go Back</a>";
       }
       else{
           echo "Error";
       }
       include './footer.php';

?>

