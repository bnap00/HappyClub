<?php
include_once './header.php';
if($_SESSION["activeStatus"]==0){
    echo "You Cannot View This Page As You Are Banned From The Forum<br /> Contact Admin To Restore Your Rights <a href='index.php>Go'";
    return;
}

if(isset($_SESSION["uid"])&&isset($_REQUEST["pid"])&&isset($_REQUEST["reply"])){
    $post = new Post(null);
    $post->setData($_REQUEST["reply"], $_SESSION["uid"], $_REQUEST["pid"], 1, "now");
    $post->save();           
    header("Location: postDetails.php?pid=".$_REQUEST["pid"]);
}
else{
    echo "error occured";
}