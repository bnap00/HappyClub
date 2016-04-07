<?php
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
?>
<script type="text/javascript" >
       
        
      
  </script>
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">News</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add News
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form   id="disapprove" method="post" action="addNewsBack.php" >
        <div class="form-group " >
     <label for="title">NEWS Title :</label>
     <center>  <input type="text" class="form-control"  name="newstitle" id="newstitle" required />
      </center>
    </div>
     <div class="form-group" >
     <label for="title">NEWS Short Description :</label>
     <center>  <input type="text" class="form-control"  name="shortdesc" id="shortdesc" required/>
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">NEWS Description :</label>
     <center>  <textarea class="form-control"  name="newsdesc" rows="5" id="newsdesc" required></textarea>
      </center>
     
    </div>
        <div class="form-group" >
        <label>Image :</label>
        <input class="form-control" type="file" id="NewsImage" name="NewsImage"/>
        </div>
         <div class="form-group">
             <input class="btn btn-success" type="submit" value="Submit" />
      </center>
    </div>
      
  </form>
                    
                </div>
            </div>
            
        </div>
        
    </div>
    </div>
</div>
<?php
include './footer.php';
?>
        
        
