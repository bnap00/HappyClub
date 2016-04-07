<?php 
include_once './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
require './DbLayer.php';

$newsid = $_REQUEST["id"];
$NewsDetails = dbLayer::getNewsdetails($newsid);
$row = mysql_fetch_array($NewsDetails)?>
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
                            Complete News List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
    <form   id="disapprove" method="post" action="NewsUpdateBack.php?id=<?php echo $newsid; ?>&image=<?php echo $row[5]; ?>" enctype="multipart/form-data" >
        <div class="form-group " >
     <label for="title">NEWS Title :</label>
     <center>  <input type="text" class="form-control" value="<?php echo $row[1];?>"  name="newstitle" id="newstitle" />
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">NEWS Description :</label>
     <center>  <textarea class="form-control"  name="newsdesc" rows="5" id="newsdesc"><?php echo $row[3];?></textarea>
      </center>
     
    </div>
        <div class="form-group" >
     <label for="comment">NEWS Short Description :</label>
     <center>  <textarea class="form-control"  name="newsshort" rows="5" id="newsshort"><?php echo $row[2];?></textarea>
      </center>
     
    </div>
       <div class="form-group" >
        <label>Image :</label>
        <input class="form-control" type="file" id="NewsImage" name="NewsImage"/>
        </div>
          <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                        </div>                                
                        </div> 
         <div class="form-group">
             <input class="btn btn-primary" type="submit" value="Update" />
      </center>
    </div>
      
  </form>
        
        
</div>
<?php
include './footer.php';     
   
         ?>