<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include_once './class/post.php';
include_once './class/user.php';
include_once './class/poll.php';
include_once './class/db_functions.php';
$dbfunction = new DB_Functions();
if(!isset($_SESSION["uid"]))
{
    header("Location: login.php");
}
else
{
    echo "<div style='height:50px;'></div>";
    $user = new user($_SESSION["uid"]);
    $_SESSION["activeStatus"]=$user->getActiveStatus();
    echo "Welcome ".$user->getFname()." ".$user->getLname()." <a href='logout.php' class='btn btn-info pull-right'>Logout</a><br />";
    if(!isset($flag)){
    $user->getNotificationStrip();}
}
?>
