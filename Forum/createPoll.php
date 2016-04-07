<?php include_once './header.php';
if($_SESSION["activeStatus"]==0){
    echo "You Cannot View This Page As You Are Banned From The Forum<br /> Contact Admin To Restore Your Rights <a href='index.php>Go'";
    return;
}
    
    ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script type="text/javascript" >
       function checkDate()
    {
         
            var title=document.getElementById("pollTitle").value;

            
            var desc=document.getElementById("polldesc").value;
            
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
            
           
          if(title=="" || desc=="" || startdate=="" || enddate=="" )
             {
                 var Warning="Please complete the fields";
                
                document.getElementById("spanWarningText").innerHTML=Warning;
                document.getElementById("Warning").style.display="block";
                
                if(title=="" )
                {
                    document.getElementById("pollTitle").style.borderColor = "#f93651";
                }
                
                if(desc=="")
                {
                    document.getElementById("polldesc").style.borderColor = "#f93651";
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
                   document.getElementById("create").submit();
               }
               else
               {
                   alert("Select Appropriate Date in EndDate");
               }
           }
           else
           {
               alert("Select Appropriate Date in StartDate");
               return ;
           }
           document.getElementById(create).submit();
       }
        }
      
  </script>
  <body>
<form id="create" action="createPollBack.php" method="post">
    <div class="form-group " >
     <label for="title">Poll Title :</label>
     <center>  <input type="text" name="pollTitle" id="pollTitle" class="form-control" placeholder="Insert Poll Title">
      </center>
    </div>
    <div class="form-group" >
     <label for="comment">Poll Description :</label>
     <center>  <textarea name="pollDesc" class="form-control" id="polldesc"  rows="5" placeholder="Insert Poll Description"></textarea>
      </center>
     
    </div>
    
    <div class="options form-group">
        <label for="comment">Enter Options :</label>
    <?php 
    for($i=0;$i<5;$i++)
    {
        echo "<input type='text' name='option[]'class='form-control' placeholder='Enter Options'><br/><br/>";
    }
    ?>
    </div>
     <div class="form-group" >
        <label>Start Date :</label>
        <input class="form-control" type="date" name="startDate"  id="startdate"  />
        </div>
    <div class="form-group" >
        <label>End Date :</label>
        <input class="form-control" type="date" name="endDate" id="enddate"  />
        </div>
     <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                            
                        </div>                                
                        </div> 
    <div class="form-group">
        <input class="btn btn-primary" type="button" id="add" value="Add Option">
             <input class="btn btn-primary" type="button" onclick="checkDate()" value="Submit" />
      </center>
    
             
     
    </div>
    
    
    
</form>
      </body>
<script type="text/javascript" src="js/poll.js"></script>
<?php
include './footer.php';