<?php
include './header.php';
if(isset($_REQUEST["adminpsk"])&&isset($_REQUEST["conpsk"])){
    if($_REQUEST["adminpsk"]==$_REQUEST["conpsk"]){
        include './DbLayer.php';
        if(dbLayer::changePassword($_REQUEST["adminpsk"])){
            echo "Successfully changed the password, Logout And Try Your New Password <a href='logout.php'>Logout</a>";
            
        }
    }
}
?>
