<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include './header.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
    </head>
    <body>
        <table>
        <?php
            $result = $dbfunction->queryDB("select PollID from poll where StartTimeStamp<='".date("Y-m-d h:i:s")."' and EndTimeStamp>='".date("Y-m-d h:i:s")."' and status=1");
            while($data = mysqli_fetch_array($result)){
                $poll = new Poll($data["PollID"]);
                $poll->displayPoll();
            }
            
            $result = $dbfunction->queryDB("select PostID from forumpost where ParentID is null");
            while($data = mysqli_fetch_array($result))
            {
                $post = new Post($data["PostID"]);
                $post->displayPost();
            }
        
        ?>
        </table>
        
        <?php
        if($_SESSION["activeStatus"]==0){
            echo "You Cannot Add Question Or Poll As You Are Banned From The Forum <br/> Contact The Admin To Restore Your Rights.";
            echo "<br /><a href='mailto:admin@happyclub.com?Subject=A%20Problem%20From%20Mobile%20Application' target='_top'>Contact Admin</a>";
        }
        else{
        ?>
        <a href="postQuestion.php" class="btn btn-success">Add A New Question</a>
        <a href="createPoll.php" class="btn btn-info">Add a new New Poll</a>
        <a href="index.php" class="btn btn-danger">Refresh</a>
        
        <?php } ?>
        <div class="footer" style="height: 150px">
            
        </div>
    </body>
    <script type="text/javascript" src="js/poll.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/polldril.js"></script>
    
</html>
