<?php 
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["event_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
$eventid = $_REQUEST["id"];
$EventDetails = dbLayer::getEventdetails($eventid);
$row = mysql_fetch_array($EventDetails);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Event</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complete Event List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
    


    <form   id="eventform" method="post" action="DeleteEventBack.php?id=<?php echo $eventid; ?>" enctype="multipart/form-data" >
        <div class="form-group " >
     <label for="title">Events Title :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[1]; ?>" name="eventtitle" id="eventtitle" readonly />
      </center>
    </div>
         <div class="form-group " >
     <label for="title">Events Name :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[4]; ?>"  name="eventname" id="eventname" readonly/>
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">Events Description :</label>
     <center>  <textarea class="form-control"  name="eventdesc" rows="5" id="eventdesc" readonly><?php echo $row[5]; ?></textarea>
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
        
          <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                            
                        </div>                                
                        </div> 
         <div class="form-group">
             <input class="btn btn-success" type="submit"  value="Delete" />
      </center>
    </div>
      
  </form>
                        </div>
                    </div>
                </div>
            </div>
 <?php 
include './footer.php';
 ?>