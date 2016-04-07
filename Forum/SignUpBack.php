<br/>
<br/>
<br/>
<br/>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<?php
include_once './class/user.php';
session_start();
$newUser = new user(null);
if($newUser->create($_REQUEST["fname"], $_REQUEST["lname"], $_REQUEST["gender"], $_REQUEST["email"], $_REQUEST["password"])){
    require './Mail/MainMail.php';
    
    $body = "Please Activate Your Account With Following Link <br />";
    $body.="<a href=http://172.21.5.8/Forum/activate.php?email=".$_REQUEST["email"]."&code=".  md5($_REQUEST["password"]).">Activate</a> <br/> If The Above Link Do Not Work Copy The Link Below  In The Browser<br />";
    $body.="http://172.21.5.8/Forum/activate.php?email=".$_REQUEST["email"]."&code=".  md5($_REQUEST["password"]);
    if(sendMail($_REQUEST["fname"]." ".$_REQUEST["lname"], $_REQUEST["email"], "Activate Your Account", $body))
    {
        echo "Please Check Your Email, We have sent you Activation link<br/><br/><a href='login.php' class='btn btn-danger'>Go Back";
    }
    
}else{
    echo "error";
}
include './footer.php';