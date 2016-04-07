<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Bharat
 */
include_once './class/db_functions.php';
class user {
    private $dbfunction = null;
    private $id = null;
    private $email = null;
    private $fname = null;
    private $lname = null;
    private $gender = null;
    private $activeStatus = null;
    private $successfullReportCount = null;
    
    
    
    
    public function __construct($uid) {
        $this->dbfunction = new DB_Functions();
        $this->id = $uid;
        $result = $this->dbfunction->queryDB("Select * from users where UserID='$uid'");
        $data = mysqli_fetch_array($result);
        $this->id = $data["UserID"];
        $this->fname=$data["FirstName"];
        $this->lname=$data["LastName"];
        $this->gender=$data["Gender"];
        $this->email=$data["Gender"];
        $this->activeStatus = $data["activeStatus"];
        $this->successfullReportCount = $data["SuccessfullReports"];
    }
    public function create($fname,$lname,$gender,$email,$password){
        $encpsk = md5($password);
        $sql = "INSERT INTO users values(null, '$email','$encpsk','$fname','$lname','$gender',0,0)";
        if($this->dbfunction->queryDB($sql)){
            return true;
        }
        else{
            return false;
        }
        
    }
    public function getFname(){
        return $this->fname;
    }
    
    public function getLname(){
        return $this->lname;
    }
    
    public function getGender(){
        return $this->gender;
    }
    
    public function getEmail(){
        return $this->email;
    }
    public function getActiveStatus(){
        return $this->activeStatus;
    }
    public function getSuccessfullReportCount(){
        return $this->successfullReportCount;
    }
    public static function activateUserAccount($email,$code){
        $sql = "update users set activeStatus=1 where Email='$email' and Password='$code'";
        echo $sql;
        $newdb = new DB_Functions();
        if($newdb->queryDB($sql)){
            return true;
        }
        else{
            return false;
        }
    }
    public function getNotificationStrip(){
        $count = $this->getNotificationCount(); 
        if($count>0){
            echo "<a class='btn btn-warning' href='notificationList.php'>$count New Notification</a>";
        }
    }
    public function getNotificationCount(){
        $sql = "select count(*) from notification_queue where UserID=".$_SESSION["uid"]." and userChecked=0";
        
        $result = $this->dbfunction->queryDB($sql);
        
        $res = mysqli_fetch_array($result);
        
        return $res[0];
    }
    public function getNotification(){
        $result = $this->dbfunction->queryDB("select * from notification_queue where UserID=".$_SESSION["uid"]." and userChecked=0");
        if(mysqli_num_rows($result)==0){
            echo "No New Notifications For You As Of Now <a href='index.php'>Go Back</a>";
        }
        else{
            echo "<br/> <h2>New Notification</h2><br/>";
        }
        $counter = 1;
        while($row = mysqli_fetch_array($result)){
            echo $counter++.")". $row["Notification"]."<br />";
        }
        if(mysqli_num_rows($result)){
            echo "<a href='markRead.php'>Mark These Notification As Read</a>";
        }
    }
    public function markAsRead(){
        $sql = "Update notification_queue set userChecked=1 where UserID=$this->id";
        if($this->dbfunction->queryDB($sql)){
            echo "Successfully Marked As Read <a href='index.php'>Go Back</a>";
        }
        else{
            echo "Error Occured <a href='index.php'>Go Back</a>";
        }
    }
    public function incrementReportCount()
    {
        //echo "inc".$this->id;
        $sql = "update users set SuccessfullReports = SuccessfullReports+1 where UserID=$this->id";
        if($this->dbfunction->queryDB($sql)){
            
            $this->successfullReportCount++;
            if($this->successfullReportCount>5){
                $sql = "update users set activeStatus=0 where UserID=$this->id";
                if($this->dbfunction->queryDB($sql)){
                    return true;
                }
                echo "error";
            }
            echo "error inc";
        }
        
    }

    public static function checkUserCredintials($email,$password){
        $encpsk = md5($password);
        $sql = "select UserID from users where Email='$email' and Password='$encpsk'";
        $newdb = new DB_Functions();
        if($result = $newdb->queryDB($sql)){
            $row = mysqli_fetch_array($result);
            return $row["UserID"];
        }
    }
}
