<?php
require '../mainDBLayer.php';
echo $_POST["conpsk"]. "||" .$_POST["newpsk"];
if(isset($_POST["newpsk"])&&isset($_POST["conpsk"])&&$_POST["newpsk"]==$_POST["conpsk"])
{
    if(resetAdminPassword($_REQUEST["id"], $_POST["newpsk"]))
    {
        header("Location: manageAdmin.php");
    }
 else {
     echo "Error";
    }
            
}
 else {
    echo "error";
 }

