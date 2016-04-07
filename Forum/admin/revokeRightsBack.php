<?php
include './header.php';
require './memberDBLayer.php';
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
if($_REQUEST["id"]==$_SESSION["AID"]){
    echo "You Cannot Change Your Own Privilages'";
    include './footer.php';
    return;
}


if(revokeAdminRights($_REQUEST["id"]))
{
    echo "successfull";
}
 else {
     echo "Error";
}
include './footer.php';