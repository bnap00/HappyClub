<?php
include_once './header.php';
if(isset($_SESSION["uid"])){
    
    if(isset($_REQUEST["pid"])){

        $post = new Post($_REQUEST["pid"]);
        if($post->report($_SESSION["uid"])){
            echo "sucess";
            include './footer.php';
        }
        else{
            echo "Error occured";
            include './footer.php';
        }
    }
    else{
            echo "Error occured";
            include './footer.php';
    }
}
else{
            echo "Error occured";
            include './footer.php';
}