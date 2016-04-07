<?php
session_start();
if(!isset($_SESSION["uid"]))
{
    echo "Nothing To Logout";
}
else
{
    unset($_SESSION["uid"]);
    echo "Logout complete";
    header("Location: login.php");
}