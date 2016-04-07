<?php
function addAdminUser($data){

    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    $sql = "";
    if(isset($data["superadmin"])){
        $sql = "INSERT INTO admin VALUES(null,'".$data["adminName"]."',1,'".md5($data["adminpsk"])."',0,0,0)";
        echo $sql;
    }
    else{
        $sql = "INSERT INTO admin VALUES(null,'".$data["adminName"]."',0,'".md5($data["adminpsk"])."',";
        if(isset($data["newsprivilage"])){
            $sql.= " 1,";
        }
        else{
            $sql.= " 0,";
        }
        if(isset($data["eventsprivilage"])){
            $sql.= " 1,";
        }
        else{
            $sql.= " 0,";
        }
        if(isset($data["forumprivilage"])){
            $sql.= " 1)";
        }
        else{
            $sql.= " 0)";
        }
    }
    return mysqli_query($con, $sql);
    
}
function getAdminName($aid){
    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    $sql = "select AdminName from admin where AdminID=".$aid;
    return mysqli_fetch_array(mysqli_query($con, $sql))["AdminName"];
}
function makeSuperAdmin($aid){
     include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    $sql = "Update admin SET AdminType=1 where AdminID=$aid";
    return mysqli_query($con, $sql);
}
function revokeAdminRights($aid){
    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    $sql = "DELETE FROM admin WHERE AdminID =".$aid;
    return mysqli_query($con, $sql);
}

function createUser($fname, $lname, $email, $psk, $conpsk, $address, $cnumber, $dob, $gender, $secQuestion, $secAnswer) {
    if ($psk != $conpsk) {
        echo $psk ." ". $conpsk;
        return false;
    }
    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "INSERT INTO user VALUES (NULL, '$fname', '$lname', '$email', '" . md5(md5("User" . $psk . "Psk")) . "', '$cnumber', '" . $address . "', '" . $dob . "', '$gender', '$secQuestion', '$secAnswer', '" . md5(rand(1000, 9999999)) . "')";
    echo $sql;
    if (mysqli_query($con, $sql)) {
        $i = mysqli_insert_id($con);
        $sql = "select Activation_Status from `user` where User_ID=".$i;
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
        require '../../Mail/MainMail.php';
        $activationMessage="Activation Link : <a href='ogs.com/ogs/main/members/activateMember.php?code=".$row["Activation_Status"]."'>Activate</a><br /><br /> If The Above Link Do Not Work Copy The Below Link In The Browser<br/> ogs.com/ogs/main/members/activateMember.php?code=".$row["Activation_Status"]." <br /> Happy Shopping";
        sendMail($fname."||".$lname, $email,"Activate Account With Given Link", $activationMessage);
        return true;
    } else {
        return false;
    }
}
function updateUser($fname, $lname, $email, $address, $cnumber, $dob, $gender, $secQuestion, $secAnswer)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include './DBFile.php';
    if(!isset($_SESSION["UID"]))
    {
        header("Location: ../login.php");
    }
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "UPDATE `user` SET `First_Name` = '$fname', `Last_Name` = '$lname', `Email` = '$email', `Contact_Number` = '$cnumber', `Address` = '$address', `DOB` = '$dob', `Gender` = '$gender', `Security_Question` = '$secQuestion', `Security_Answer` = '$secAnswer' WHERE `User_ID` =".$_SESSION["UID"];
    if(mysqli_query($con, $sql))
    {
        initializeUserSession($_SESSION["UID"]);
        return TRUE;
    }
 else {
    return false;    
    }
}
function deleteUserAccount($id)
{
        if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include '.././DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "DELETE FROM `user` WHERE User_ID=$id";
    echo $sql;
    if(mysqli_query($con, $sql))
    {
        $sql = "DELETE FROM `wishlist` WHERE User_ID=$id";
        if(mysqli_query($con, $sql))
        {
            destroyUserSession();
            return TRUE;
        }
        else 
            {            
                return false;
            }
        
    }
    else
    {
        return false;
    }
    
}
function activatAccount($code) {
    if ($code == "Active") {
        return true;
    }
    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "select User_ID from user where Activation_Status = '$code'";
    $res = mysqli_query($con, $sql);
    $rows = mysqli_num_rows($res);
    if ($rows != 1)
        return FALSE;
    $row = mysqli_fetch_array($res);
    $sql = "UPDATE user SET `Activation_Status` = 'Active' WHERE User_ID ='" . $row["User_ID"] . "'";
    if (mysqli_query($con, $sql)) {
        return TRUE;
    } else {
        return FALSE;
    }
}



function checkAdminCredientials($uname, $psk) {
    include './DBFile.php';
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $encpsk = md5($psk);

    $result = mysqli_query($con, "Select * from admin where AdminName='$uname' and Password='$encpsk'");
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $row = mysqli_fetch_array($result);
        
        $_SESSION["AID"]=$row["AdminID"];
        if($row["AdminType"]==1){
            $_SESSION["admin"]="super";
        }
        else{
            $_SESSION["admin"]="sub";
            $_SESSION["news_p"]=$row["newsPrivilages"];
            $_SESSION["event_p"]=$row["eventPrivilages"];
            $_SESSION["forum_p"]=$row["forumPrivilages"];
        }
        
        
        
        return true;
    } else {
        echo "UserName or Password Incorrect";
    }
}

function changeUserPassword($newPsk) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["UID"])) {
        header("Location: ../login.php");
        return false;
    }
    include '.././DBFile.php';

    if (!isset($_SESSION["UID"])) {
        echo "Login First";
        return false;
    }
    $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $sql = "UPDATE user SET `Password` = '" . md5(md5("User" . $newPsk . "Psk")) . "' WHERE User_ID ='" . $_SESSION["UID"] . "'";
    echo $sql;
    if (mysqli_query($con, $sql)) {
        return TRUE;
    } else {
        return FALSE;
    }
}
