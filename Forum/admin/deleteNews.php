<?php 
require './DbLayer.php';
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
$newsid = $_REQUEST["id"];
$EventDetails = dbLayer::getNewsdetails($newsid);
$row = mysql_fetch_array($EventDetails);
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">News</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Delete News
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
        <form   id="disapprove" method="post" action="deleteNewsBack.php?id=<?php echo $newsid; ?>" enctype="multipart/form-data" >
        <div class="form-group " >
     <label for="title">NEWS Title :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[1];?>"  name="newstitle" id="newstitle" readonly/>
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">NEWS Description :</label>
     <center>  <textarea class="form-control"  name="newsdesc" rows="5" id="newsdesc" readonly><?php echo $row[2];?></textarea>
      </center>
     
    </div>
        <div class="form-group" >
     <label for="comment">NEWS Short Description :</label>
     <center>  <textarea class="form-control"  name="newsshort" rows="5" id="newsshort" readonly><?php echo $row[3];?></textarea>
      </center>
     
    </div>
       
         <div class="form-group">
             <input class="btn btn-primary" type="submit" value="Delete" />
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