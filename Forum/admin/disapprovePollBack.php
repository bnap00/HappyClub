<?php
include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}

chdir("../");

require './admin/DbLayer.php';
include './class/poll.php';

$poll = new Poll($_REQUEST["id"]);

if(dbLayer::DisApprovedUpdateStatusCode($_REQUEST["id"], $poll->getAuthorID(), $_REQUEST["reason"])){
    echo "Operation Successfull";
}
include './admin/footer.php';
