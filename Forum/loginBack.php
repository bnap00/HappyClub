<br/>
<br/>
<br/>
<br/>
 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<?php
require './admin/DbLayer.php';
$TempPassword=$_REQUEST["Password"];
$Username=$_REQUEST["Username"];
include './class/user.php';
if($uid = User::checkUserCredintials($_REQUEST["Username"], $_REQUEST["Password"])){
    session_start();
    $_SESSION["uid"]=$uid;
    header("Location: index.php");
}
else{
    echo "Error In Login Credentials <br/><br/><a href='login.php' class='btn btn-danger'>Go Back</a>";
}