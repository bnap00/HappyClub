<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of post
 *
 * @author Bharat
 */
include_once './class/db_functions.php';
class Post {
    private $postID = null;
    private $parentID=null;
    private $post=null;
    private $author=null;
    private $timestamp=null;
    private $visibility=null;
    private $dbfunction=null;
    private $verified = null;
    public function __construct($pid) {
        $this->dbfunction = new DB_Functions();
        if($pid==NULL)
        {
            
        }
        else{
            
            $result = $this->dbfunction->queryDB("select * from forumpost where PostID=$pid");
            if($result){
                
            $data = mysqli_fetch_array($result);
            $this->postID=$data["PostID"];
            $this->post=$data["Post"];
            $this->parentID=$data["ParentID"];
            $this->author=$data["UserID"];
            $this->timestamp=$data["TimeStamp"];
            $this->visibility=$data["Visibility"];
            $this->verified = $data["verified"];
            }
            else{
                die("Error");
                
            }
            
        }
    }
    public function setAsVerified(){
        if($this->dbfunction->queryDB("update forumpost set verified=1 where PostID=$this->postID")){
            return TRUE;
        }
    }
    public function setData($data, $userid, $parentpost,$visibility,$timestamp){
        $this->author = $userid;
        $this->post= $data;
       
        $this->parentID = $parentpost;
        $this->visibility = $visibility;
        $this->timestamp = $timestamp;
    }

    public function getPostID(){
        return $this->postID;
    }
    
    public function getPost(){
        return $this->post;
    }
    
    public function getParentID(){
        return $this->parentID;
    }
    
    public function getAuthorID(){
        return $this->author;
    }
    
    public function getTimestamp(){
        return $this->timestamp;
    }
    
    public function displayPost(){
        
                 echo "<link href='Pro_Css.css' rel='stylesheet' type='text/css'/>
                    <script src='js/jquery.min.js'></script>
                    <script src='js/bootstrap.min.js'></script>
                    <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'/>
                    <script src='bootstrap-3.2.0-dist/js/bootstrap.js'></script>
                    <script src='bootstrap-3.2.0-dist/js/bootstrap.min.js' type='text/javascript'></script>
                   <tr><td>
                    <div class='container'>
                      <div class='row'>
                        <div class='col-sm-12'>
                            <section class='comment-list'>
                              <!-- First Comment -->
                                <article class='row'>
                                    <div class='col-md-2 col-sm-2 hidden-xs'>
                                        <figure class='thumbnail'>
                                            <img class='img-responsive' src='img/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg' />
                                            <figcaption class='text-center'>username</figcaption>
                                       </figure>
                                    </div>
                            <div class='col-md-10 col-sm-10'>
                                <div class='panel panel-default arrow left'>
                                    <div class='panel-body'>
                                    <header class='text-left'>
                                        <div class='comment-user'><i class='fa fa-user'></i> </div>
                                        <time class='comment-date' datetime='16-12-2014 01:05'><i class='fa fa-clock-o'></i>  ".$this->getTimestamp()."</time>
                                    </header>";
                                    
        if($this->postID && $this->parentID==null && $this->getVisibility()){

                                    echo "<div class='comment-post'>
                                        <p>".$this->getPost()."</p>
                                    </div>
                                    <p class='text-right'>"
                                    . "  <a class='a1 btn btn-warning btn-circle text-uppercase' href='postDetails.php?pid=".$this->getPostID()."'><i class='fa fa-comments-o fa-1x'></i> ".$this->getReplyCount()."  Replies</a></p>";
                                    if(!$this->verified){
                                    if(!$this->isReportedByUser($_SESSION["uid"])){
                                      echo "<p class='text-left'><a class='a1 btn btn-primary btn-sm' href='reportPost.php?pid=".$this->postID."'> <i class='fa fa-thumbs-down'></i> Report Abuse</a></p>";
                                    }
                                    else{
                                        echo "<p class='text-right'><div class='a1 btn btn-danger btn-sm'>Abuse Reported</div></p>";
                                        }
                                    }

                      
        }
        else if($this->parentID!=null and $this->getVisibility()){
            echo $this->post;
            
                    if(!$this->verified){
                    if(!$this->isReportedByUser($_SESSION["uid"])){
                    echo "<div class='comment-post'><p class='text-left'><a class='a1 btn btn-primary btn-sm' href='reportPost.php?pid=".$this->postID."'> <i class='fa fa-thumbs-down'></i> Report Abuse</a></p></div>";
                    }
                    else{
                        echo "<div class='and'>Reported Post By You</div>";
                    }
                    }
            
        }
                                echo "</div>
                                </div>
                            </div>
                             </article>
                        </section>
                    </div>
                </div>
            </div>
        </td></tr>";
    }
    private function getVisibility(){
        if($this->visibility==0)
        {
            return FALSE;
        }
        else if($this->visibility==1)
        {
            return TRUE;
        }
        else
        {
            echo "Error";
        }
    }
    
    private function getReplyCount(){
        if($this->postID)
        return mysqli_fetch_array($this->dbfunction->queryDB("SELECT count(*) as count FROM forumpost WHERE ParentID=$this->postID"))["count"];
    }
    public function getReplies(){
        if($this->postID && $this->getReplyCount()>0)
        {
           
            $replies[] = Array();
            $result = $this->dbfunction->queryDB("select PostID from forumpost where ParentId=".$this->postID." ORDER BY PostID DESC");
            while ($record = mysqli_fetch_array($result)){
                array_push($replies, new Post($record["PostID"]));
            }
            
            
            return $replies;
        }
        else{
            echo "No Reply to the answer";
            return NULL;
        }
    }
    
    public function report($uid){
        if($this->dbfunction->queryDB("select PostID from forumpost where PostID=".$this->postID)){
            

            if(mysqli_num_rows($this->dbfunction->queryDB("select ReportID from reports where PostID=".$this->getPostID()." and UserID=".$uid))==0){

                if($this->dbfunction->queryDB("Insert INTO reports(ReportID, PostID, UserID) Values (NUll,$this->postID,$uid)")){

                    return TRUE;
                    if(mysqli_num_rows($this->dbfunction->queryDB("select * from reports where PostID=$this->postID"))>5){
                        if($this->dbfunction->queryDB("update forumpost set Visibility=0 where PostID=$this->postID")){
                            echo "This post is Too Much Reported So This Post Is Temporarily Removed Till The Admin Verify It<br />";
                        }
                    }
                }
            }
            else{
                return FALSE;
            }
        }
    }
    private function isReportedByUser($uid){
        $sql = "select ReportID from reports where PostID=".$this->getPostID()." and UserID=".$uid;
        
        if($result = $this->dbfunction->queryDB($sql)){
            if(mysqli_num_rows($result)>0)
            {
        
            return TRUE; 
        }
        else{
        
            return FALSE;
        }
    }
    }
    public function save(){
        
        if($this->dbfunction->queryDB("select PostID from forumpost where PostID=".$this->postID)){
            if($this->dbfunction->queryDB("UPDATE forumpost SET Post = '".$this->post."', Visibility='".$this->visibility."' WHERE PostID =".$this->postID)){
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
        else
        {
            $sql ="";
            if($this->parentID==null){
                
                $sql = "INSERT INTO forumpost (`PostID`, `ParentID`, `Post`, `UserID`, `TimeStamp`, `Visibility`,`verified`) VALUES (NULL,NULL, '".$this->post."', '".$this->author."', NOW(), '1',0)";
            }
            else{
                $sql = "INSERT INTO forumpost (`PostID`, `ParentID`, `Post`, `UserID`, `TimeStamp`, `Visibility`,`verified`) VALUES (NULL,".$this->parentID.", '".$this->post."', '".$this->author."', NOW(), '1',0)";
            }
            
            
            if($this->dbfunction->queryDB($sql))
            
            {
                return TRUE;
            }
            else{
                return FALSE;
            }
            
        }
    }    
}
