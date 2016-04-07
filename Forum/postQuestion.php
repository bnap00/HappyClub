<?php include_once './header.php';
if($_SESSION["activeStatus"]==0){
    echo "You Cannot View This Page As You Are Banned From The Forum<br /> Contact Admin To Restore Your Rights <a href='index.php>Go'";
    return;
}

?>
 <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<form action="postQuestionBack.php" method="post">
    <div class="form-group" >
     <label for="comment">Add Question:</label>
     <center>  <textarea name="question" placeholder="Enter Your Question Here..." required class="form-control" id="polldesc"  rows="5" placeholder="Insert Poll Description"></textarea>
      </center>
     
    </div>
    <input type="submit">
</form>
<?php
include './footer.php';