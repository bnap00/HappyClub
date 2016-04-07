<?php
include './header.php';
if(isset($_SESSION["AID"])&&$_SESSION["admin"]!="super"){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
if(!isset($_REQUEST["id"])){
    echo "Error Occured";
    include './footer.php';
    return;
}
include './memberDBLayer.php';
if(makeSuperAdmin($_REQUEST["id"])){
    echo "Operation Successfull <a href='manageAdmin.php'>go back</a>";
}
else{
    echo "error occured <a href='manageAdmin.php'>go back</a>";
}
include './footer.php';