<?php 
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["event_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
require './DbLayer.php';
$eventid = $_REQUEST["id"];
$EventDetails = dbLayer::getEventdetails($eventid);
     $row = mysql_fetch_array($EventDetails);?>

    


    <form   id="eventform" method="post" action="eventUpdateBack.php?id=<?php echo $eventid; ?>&image=<?php echo $row[6]; ?>" enctype="multipart/form-data" >
        <div class="form-group " >
     <label for="title">Events Title :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[1]; ?>" name="eventtitle" id="eventtitle" />
      </center>
    </div>
         <div class="form-group " >
     <label for="title">Events Name :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[4]; ?>"  name="eventname" id="eventname" />
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">Events Description :</label>
     <center>  <textarea class="form-control"  name="eventdesc" rows="5" id="eventdesc"><?php echo $row[5]; ?></textarea>
      </center>
     
    </div>
        <div class="form-group" >
        <label>Start Date :</label>
        <input class="form-control" type="date"  id="startdate" value="<?php echo $row[2]; ?>" name="startdate" Readonly/>
        </div>
        <div class="form-group" >
        <label>End Date :</label>
        <input class="form-control" type="date" id="enddate" value="<?php echo $row[3]; ?>" name="enddate" Readonly/>
        </div>
        <div class="form-group" >
        <label>Image :</label>
        <input class="form-control" type="file" id="EventImage" name="EventImage"/>
        </div>
          <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                        </div>                                
                        </div> 
         <div class="form-group">
             <input class="btn btn-success" type="submit"  value="Submit" />
      </center>
    </div>
      
  </form>
<?php    include './footer.php';