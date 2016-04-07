<?php
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
 $title =  $_REQUEST["newstitle"];
 $shortDesc = $_REQUEST["shortdesc"];
  $desc = $_REQUEST["newsdesc"];

$newsid = dbLayer::InsertNews($title,$shortDesc,$desc);
chdir("../");
$message = "New News Added";
include './gcm/sendMulticast.php';
 $path="../newsImg/";
 //mkdir($path);
 $moveResult=false;
 if(isset($_REQUEST["NewsImage"])){
 $moveResult =move_uploaded_file($_FILES['NewsImage']["tmp_name"],$path.$newsid.".jpg");
 }
if ($moveResult == true) {
   dbLayer::UpdateNews($newsid,$newsid);
   echo "Insert Successfull <a href='addNews.php'> Go Back</a>";
}
else {
     echo "Insert Successfull <a href='addNews.php'> Go Back</a>";
}
include './admin/footer.php';
