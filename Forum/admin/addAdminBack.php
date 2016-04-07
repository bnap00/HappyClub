<?php
require './memberDBLayer.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
if(isset($_SESSION["AID"])&&$_SESSION["admin"]!="super"){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
if(isset($_POST["adminName"])&&isset($_POST["adminpsk"])&&isset($_POST["conpsk"])&&$_POST["adminpsk"]==$_POST["conpsk"])
{
    if(addAdminUser($_POST))
    {
        header("Location: manageAdmin.php");
    }
 else {
     echo "Error";
    }
            
}
 else {
    echo "error";
 }
