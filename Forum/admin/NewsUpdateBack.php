<?php
include './header.php';
require './DbLayer.php';
 if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
$NewsID = $_REQUEST['id'];
$title = $_REQUEST['newstitle'];
$content = $_REQUEST['newsdesc'];
$desc = $_REQUEST['newsshort'];
$path="../newsImg/";
$moveResult =move_uploaded_file($_FILES['NewsImage']["tmp_name"],$path.$NewsID.".jpg");
$image = 0;
if($moveResult){
    $image = 1;
}
else{
    $image = $_REQUEST["image"];
}
$NewsUpdate = dbLayer::AllUpdateNews($NewsID,$title,$content,$desc,$image);

if($NewsUpdate){
    echo "Successfully Updated";
}
else{
    echo "Error Occured";
}

?>

