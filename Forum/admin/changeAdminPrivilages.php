<?php
include './header.php';
include './DBFile.php';
if(isset($_SESSION["AID"])&&$_SESSION["admin"]!="super"){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
if(!isset($_REQUEST["id"])){
    echo "Error Occured";
    include './footer.php';
    return;
}
if($_REQUEST["id"]==$_SESSION["AID"]){
    echo "You Cannot Change Your Own Privilages'";
    include './footer.php';
    return;
}

$con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
$sql = "UPDATE admin SET";
$sql.= " `newsPrivilages` =";
if(isset($_REQUEST["newsprivilages"])){
    $sql.= " '1'";
}
else{
    $sql.= " '0'";
}
$sql.= ", `eventPrivilages` =";
if(isset($_REQUEST["eventsprivilages"])){
    $sql.= " '1'";
}
else{
    $sql.= " '0'";
}
$sql.= ", `forumPrivilages` =";
if(isset($_REQUEST["forumprivilages"])){
    $sql.= " '1'";
}
else{
    $sql.= " '0'";
}
$sql.= " WHERE AdminID =".$_REQUEST["id"];


if(mysqli_query($con, $sql)){
    echo "Successfull Change The Privilages <a href='manageAdmin.php'>Go Back</a>";
    
}
else{
    echo "error";
}

include './footer.php';