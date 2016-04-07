<?php
include_once './header.php';
if($_SESSION["activeStatus"]==0){
    echo "You Cannot View This Page As You Are Banned From The Forum<br /> Contact Admin To Restore Your Rights <a href='index.php'>Go Back</a>";
    return;
}

$newQuestion = new Post(null);
$newQuestion->setData($_REQUEST["question"], $_SESSION["uid"],NULL,1,"now");
if($newQuestion->save()){
    echo "Successfully Inserted The Question";
}
else{
    echo 'Error Occured';
}

