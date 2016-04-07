<?php
if(isset($_REQUEST["email"])&&isset($_REQUEST["code"])){
    include './class/user.php';
    if(user::activateUserAccount($_REQUEST["email"], $_REQUEST["code"])){
        echo "Your Account Has Been Activated";
    }
    else{
        echo "error occured";
    }
}