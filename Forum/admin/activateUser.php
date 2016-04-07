<?php

include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
if(!isset($_REQUEST["id"])){
    echo "Error Loading Details";
    include './footer.php';
    return;
}
include './DbLayer.php';
if(dbLayer::activateUser($_REQUEST["id"])){
    echo "Successfully Activated The User   <a href='viewInActiveUsers.php>Go Back</a>'";
}
include './footer.php';