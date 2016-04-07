<?php
include './header.php';
if($_SESSION["admin"]!="super" && $_SESSION["event_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
?>
  <script type="text/javascript" >
       function checkDate()
    {
         
            var title=document.getElementById("eventtitle").value;
            
            var name=document.getElementById("eventname").value;
            var desc=document.getElementById("eventdesc").value;
            
            var dt =new Date();
            var month=dt.getMonth()+1;
            var year =dt.getFullYear();
            var mdate =dt.getDate();
            if(mdate<10) {
                    mdate='0'+mdate;
                       } 

              if(month<10) {
                    month='0'+month;
                        } 
            var fdate =dt.getFullYear()+"-"+month+"-"+mdate;
            
            
            
            
            var startdate=document.getElementById("startdate").value;
            
            var enddate=document.getElementById("enddate").value;
            
           
          if(title=="" || desc=="" || startdate=="" || enddate=="" || name=="")
             {
                 var Warning="Please complete the fields";
                
                document.getElementById("spanWarningText").innerHTML=Warning;
                document.getElementById("Warning").style.display="block";
                
                if(title=="" )
                {
                    document.getElementById("eventtitle").style.borderColor = "#f93651";
                }
                if(name=="" )
                {
                    document.getElementById("eventname").style.borderColor = "#f93651";
                }
                if(desc=="")
                {
                    document.getElementById("eventdesc").style.borderColor = "#f93651";
                }
                if(startdate=="" )
                {
                    document.getElementById("startdate").style.borderColor = "#f93651";
                }
                if(enddate=="")
                {
                    document.getElementById("enddate").style.borderColor = "#f93651";
                }
             }
           else
           {
               if(fdate <= startdate)
               {
               if(enddate >= startdate)
               {
                   document.getElementById("eventform").submit();
               }
               else
               {
                   alert("Select Appropriate Date in EndDate");
               }
           }
           else
           {
               alert("Select Appropriate Date in StartDate");
           }
       }
        }
      
  </script>
  
  <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Event</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add Event
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
  
                    <form   id="eventform" method="post" action="addEventBack.php" enctype="multipart/form-data" >
        <div class="form-group " >
     <label for="title">Events Title :</label>
     <center>  <input type="text" class="form-control"  name="eventtitle" id="eventtitle" />
      </center>
    </div>
         <div class="form-group " >
     <label for="title">Events Name :</label>
     <center>  <input type="text" class="form-control"  name="eventname" id="eventname" />
      </center>
    </div>
     
    <div class="form-group" >
     <label for="comment">Events Description :</label>
     <center>  <textarea class="form-control"  name="eventdesc" rows="5" id="eventdesc"></textarea>
      </center>
     
    </div>
        <div class="form-group" >
        <label>Start Date :</label>
        <input class="form-control" type="date"  id="startdate" name="startdate" />
        </div>
        <div class="form-group" >
        <label>End Date :</label>
        <input class="form-control" type="date" id="enddate" name="enddate" />
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
             <input class="btn btn-success" type="button" onclick="checkDate()" value="Submit" />
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
        
        

  