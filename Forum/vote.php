<?php
session_start();
include_once './class/db_functions.php';
include_once './class/poll.php';
if($_SESSION["activeStatus"]==0){
    echo "You have not activated your account or You Cannot View This Page As You Are Banned From The Forum, Contact Admin To Restore Your Rights or activate your account by the link sent to your email";
    return;
}

if(isset($_SESSION["uid"])){
    if(isset($_REQUEST["vid"])&&!empty($_REQUEST["vid"])&&isset($_REQUEST["vote"])&&!empty($_REQUEST["vote"])){
        $dbfunction = new DB_Functions();
        $poll = new Poll($_REQUEST["vid"]);
        if($poll->vote($_REQUEST["vote"]))
        {
            echo "Voted Sucessfully";
        }
        else{
            echo "Error Occured";
        }
    }
}