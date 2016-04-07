<?php
include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
 $PollId = $_REQUEST["id"];
 include './DbLayer.php';
$PollDetails = dbLayer::getPolldetails($PollId);
$row = mysql_fetch_array($PollDetails);
       $_SESSION['userid']=$row[1];
 ?>   



    
<form id="disapprove" method="post"  action="disapprovePollBack.php?id=<?php echo $PollId; ?>">
      <div class="form-group">
     <label for="comment">Poll Title :</label>
     <center>  <input type="text" class="form-control"  value="<?php echo $row[2];?>" id="title" readonly/>
      </center>
    </div>
      <div class="form-group">
     <label for="comment">Poll Description :</label>
     <center>  <textarea class="form-control" rows="5"  id="desc" readonly><?php echo $row[3];?></textarea>
      </center>
    </div>
    <div class="form-group">
     <label for="comment">Reason of DisApproval :</label>
     <center>  <textarea class="form-control" rows="5" id="reason" name="reason"  placeholder="Reason For Disapproval of poll" required></textarea>
      </center>
    </div>
      <div class="form-group">
          <input class="btn btn-primary" type="submit" value="Submit"/>
      </center>
    </div>
      
  </form>
<?php
 include './footer.php';