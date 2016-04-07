<?php
include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
require './DbLayer.php';
$PollId=$_REQUEST["id"];

if(dbLayer::ApprovedUpdateStatusCode($PollId)){
    echo "Successfull";
}
else{
    echo "Error";
}
include './footer.php';

?>