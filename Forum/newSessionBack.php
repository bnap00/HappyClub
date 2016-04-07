<?php
session_start();
if(isset($_SESSION["uid"])){
    header("Location: index.php");
}
if(isset($_REQUEST["userid"]))
{
    $_SESSION["uid"] = $_REQUEST["userid"];
    header("Location: index.php");
}
echo "Error";
