<?php
session_start();
require './memberDBLayer.php';
if($_POST["uname"]&&$_POST["password"])
{
    if($aid = checkAdminCredientials($_POST["uname"], $_POST["password"]))
    {
        if($_SESSION["admin"]=="super"){
            header("Location: manageAdmin.php");
        }
        else{
            if($_SESSION["forum_p"]==1){
                header("Location: ViewReportedPosts.php");
            }
            elseif ($_SESSION["event_p"]==1) {
                header("Location: viewEvents.php");
            }
            elseif ($_SESSION["news_p"]==1) {
                header("Location: viewNews.php");
            }
            else{
                echo "You Have Not Assigned Any Rights Or Your Rights Have Been Revoked. Contact Super Admin To Restore The Rights";
            }
            
            
        
        }
    }
    else
    {
        echo "Login Unsucessfull";  
        //header("Location: login.php");
    }
}
 else {
    echo "Login Unsucessfull";  
    header("Location: login.php");
    }
    
