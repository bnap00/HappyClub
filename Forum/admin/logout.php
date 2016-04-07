<?php
session_start();
if(isset($_SESSION["AID"]))
{
    unset($_SESSION["AID"]);
    unset($_SESSION["admin"]);
    unset($_SESSION["news_p"]);
    unset($_SESSION["forum_p"]);
    unset($_SESSION["event_p"]);
    header("Location: login.php");
}