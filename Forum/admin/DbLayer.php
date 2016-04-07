<?php
class dbLayer {
    private static $con;
    private static $dbName;
    private static $serverName;
    private static $userName;
    private static $dbConnected;
    
    public static function load()
    {
        self::$serverName="localhost";
        self::$dbName="happyclubdb";
        self::$userName="root";
        self::$con=  mysql_connect(self::$serverName,  self::$userName) or die(mysql_error());
        self::$dbConnected= mysql_select_db(self::$dbName) or die(mysql_error());
    }

public static function CheckUser($Username)
    { 
        self::load();
        $query="select UserName from users where UserName='".$Username."'";
        $result= mysql_query($query,  self::$con) or die(mysql_error());
        $numrows=  mysql_num_rows($result) or die(mysql_error());
        if($numrows>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public static function getPassword($Username)
    {
        self::load();
        $query="select Password from users Where Email='".$Username."'";
        $result=  mysql_query($query);
        $row=  mysql_fetch_array($result);
        return $row[0];
    }
    public static function getStatus()
    {
        self::load();
        $query="SELECT count(status) FROM poll WHERE status=0";
        $result=  mysql_query($query);
        
        $row=  mysql_fetch_array($result);
        return $row[0];
    }
    public static function getPollTitle()
    {
        self::load();
        $query="SELECT DATE_FORMAT(StartTimeStamp,'%Y-%m-%d')DATEONLY ,Title,PollID FROM poll WHERE status=0 ORDER BY StartTimeStamp DESC LIMIT 3";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   public static function getPolldetails($PollId)
    {
        self::load();
        $query="SELECT *  FROM poll WHERE PollID ='$PollId'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   public static function getUserName($UserId)
    {
        self::load();
        $query="SELECT FirstName ,LastName  FROM users WHERE UserID ='$UserId'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   public static function getStatusCode($PollId)
    {
        self::load();
        $query="SELECT status FROM poll WHERE PollID ='$PollId'";
        $result=  mysql_query($query);
        
        $row=  mysql_fetch_array($result);
        return $row[0];
    }
     public static function getUserId($UserName)
    {
        self::load();
        $query="SELECT UserID FROM users WHERE Email ='$UserName'";
        $result=  mysql_query($query);
        
        $row=  mysql_fetch_array($result);
        return $row[0];
    }
    public static function ApprovedUpdateStatusCode($PollId)
    {
        self::load();
        $query="update poll set Status='1' WHERE PollID ='$PollId'";
        $result=mysql_query($query) or die(mysql_error());
        if($result)
            
             return true;
        else 
          return FALSE; 

    }
    public static function DisApprovedUpdateStatusCode($PollId,$UserId,$reason)
    {
        self::load();
        $notification = "Your Poll Request Has been disapproved by the admin, <br/> Reason:<br/>".$reason;
        $query="insert into notification_queue values(null,'$UserId','$notification',0)";
        $result=  mysql_query($query) or die(mysql_error());
        if($result)
        {
        $query1="update poll set Status='2' WHERE PollID ='$PollId'";
        $result1=mysql_query($query1) or die(mysql_error());
        if($result1)
        {
            return TRUE;
        }
        else {
            return FALSE;
       }
        }
       else {
           return FALSE;
       }
    }
    

public static function UserPollNotif($time,$userid)
    {
        self::load();
        $query="select Time,Reason from disapprove_poll where Time > '$time' and UserID='$userid'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }


 public static function InsertNews($title,$shortDesc,$desc)
    {
        self::load();
        $query="insert into newslist values('NULL','$title','$shortDesc','$desc',now(),0)";
        $result=  mysql_query($query) or die(mysql_error());
        if($result)
        {
          return mysql_insert_id(); 
        }
        else
        {
            return FALSE;
        }
    }
    public static function UpdateNews($image,$NewsID)
    {
        self::load();
        $query="update newslist set Image='$image' WHERE NewsID ='$NewsID'";
        $result=mysql_query($query) or die(mysql_error());
        if($result)
        {
             return mysql_insert_id();
        }
        else{ 
          return FALSE; 
        }
}


public static function InsertEvent($name,$startdate,$enddate,$title,$desc)
    {
        self::load();
        $query="insert into event values('NULL','$name','$startdate','$enddate','$title','$desc','0')";
        $result=  mysql_query($query) or die(mysql_error());
        if($result)
        {
          return mysql_insert_id(); 
        }
        else
        {
            return FALSE;
        }
    }
    public static function changePassword($newPsk){
        self::load();
        $aid = $_SESSION["AID"];
        $encpsk = md5($newPsk);
        $query="Update admin set Password='$encpsk' where AdminID=$aid";
        $result= mysql_query($query);
        if($result){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public static function UpdateEvent($image,$EventID)
    {
        self::load();
        $query="update event set Image='$image' WHERE EventID ='$EventID'";
        $result=mysql_query($query) or die(mysql_error());
        if($result)
            
             return true;
        else 
          return FALSE; 
}
public static function getNewPolls(){
    self::load();
    $query= "select PollID from poll where status=0";
    return mysql_query($query);
}
public static function getApprovedPolls(){
    self::load();
    $query= "select PollID from poll where status=1";
    return mysql_query($query);
}
    public static function getNews(){
        self::load();
        $query = "select * from newslist";
        return mysql_query($query);
    }
    public static function getEvent(){
        self::load();
        $query = "select * from event";
        return mysql_query($query);
    }

    public static function getBannedUsers(){
        self::load();
        $query = "select * from users where activeStatus=0 and SuccessfullReports>0";
        return mysql_query($query);
    }
    public static function getInactiveUsers(){
        self::load();
        $query = "select * from users where activeStatus=0 and SuccessfullReports=0";
        return mysql_query($query);
    }
    public static function unBanUser($uid){
        self::load();
        $query= "update users set activeStatus=1 where UserID=$uid";
        return mysql_query($query);
    }
    public static function activateUser($uid){
        self::load();
        $query= "update users set activeStatus=1 where UserID=$uid";
        return mysql_query($query);
    }
    public static function getNewsdetails($NewsId)
        {
            self::load();
            $query="SELECT *  FROM newslist WHERE NewsID ='$NewsId'";
             $result= mysql_query($query,  self::$con) or die(mysql_error());
             return $result;
       }
       public static function AllUpdateNews($NewsID,$title,$content,$desc,$image)
        {
            self::load();
            $query="update newslist set Title='$title',Content='$content',shortDesc='$desc', image=$image WHERE NewsID ='$NewsID'";
            $result=mysql_query($query) or die(mysql_error());
            if($result)

                 return true;
            else 
              return FALSE; 
    }
    public static function getEventdetails($EventId)
    {
        self::load();
        $query="SELECT *  FROM event WHERE EventID ='$EventId'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   
   public static function justifyReport2($pid){
       self::load();
              include_once './class/post.php';
       include_once './class/user.php';
       $query = "Select ReportID from reports where PostID=$pid";
       $result = mysql_query($query);
       while($row = mysql_fetch_array($result)){
           self::justifyReport($row["ReportID"]);
       }
       
       $query = "update forumpost set Visibility=0 where PostID=$pid";
       mysql_query($query);
   }
   public static function unjustifyReport2($pid){
       self::load();
              include_once './class/post.php';
       include_once './class/user.php';
       $query = "Select ReportID from reports where PostID=$pid";
       $result = mysql_query($query);
       while($row = mysql_fetch_array($result)){
          
        self::unjustifyReport($row["ReportID"]);
       }
       $query = "update forumpost set verified=1 and Visibility=1 where PostID=$pid";
       
       
       mysql_query($query);
   }
   public static function justifyReport($rid){
       self::load();
       $query = "Select PostID from reports where ReportID=$rid";
       

       $result = mysql_query($query);
       $res = mysql_fetch_array($result);
       //print_r($result);
       $post = new Post($res["PostID"]);
       
       $user = new user($post->getAuthorID());
       $user->incrementReportCount();
       $userid = $post->getAuthorID();
       $notification = " One Of Your Post Was Reported Positivly by the Admin, Please Take Care Of Things You Say on Forum, or else you would get banned from posting in the forum";
        $query="insert into notification_queue values(null,'$userid','$notification',0)";
        $result=  mysql_query($query) or die(mysql_error());
        
        mysql_query("delete from reports where ReportID=$rid");
   }
   public static function unjustifyReport($rid){
       self::load();
       $query = "Select * from reports where ReportID=$rid";
       $result = mysql_query($query);

       $res = mysql_fetch_array($result);
       $post = new Post($res["PostID"]);
       $user = new user($res["UserID"]);
       $user->incrementReportCount();
       $post->setAsVerified();
       $userid = $post->getAuthorID();
       $notification = " One Of Your Report Was marked fake by the Admin, Please Take Care Of Things You Report on Forum, or else you would get banned from posting in the forum";
        $query="insert into notification_queue values(null,'$userid','$notification',0)";
        $result=  mysql_query($query) or die(mysql_error());
        mysql_query("delete from reports where ReportID=$rid");
   }

   public static function AllUpdateEvent($EventID,$name,$title,$desc,$image)
    {
        self::load();
        $query="update event set EventName='$name',Title='$title',Description='$desc',image='$image' WHERE EventID ='$EventID'";
        
        $result=mysql_query($query) or die(mysql_error());
        if($result)
            
             return true;
        else 
          return FALSE; 
}
public static function DeleteEventdetails($EventId)
    {
        self::load();
        $query="Delete  FROM event WHERE EventID ='$EventId'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   public static function DeleteNewsdetails($NewsId)
    {
        self::load();
        $query="Delete  FROM newslist WHERE NewsID ='$NewsId'";
         $result= mysql_query($query,  self::$con) or die(mysql_error());
         return $result;
   }
   public static function getReportedPosts(){
       self::load();
       $query = "select DISTINCT PostID from reports";
       $result = mysql_query($query);
       return $result;
   }
}