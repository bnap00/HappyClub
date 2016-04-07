
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" >
       function FormValidation()
    {
         
            var fname=document.getElementById("fname").value;
            var lname=document.getElementById("lname").value;
            var email=document.getElementById("email").value;
            var pass=document.getElementById("pass").value;
            var cpass=document.getElementById("cpass").value;
            var vcheck=document.getElementById('vcheck').checked;
            
            
            
            
            
            
           
          if(fname=="" || lname==""  || email=="" || pass=="" || cpass=="" )
             {
                 var Warning="Please complete the fields";
                
                document.getElementById("spanWarningText").innerHTML=Warning;
                document.getElementById("Warning").style.display="block";
                
                if(fname=="" )
                {
                    document.getElementById("fname").style.borderColor = "#f93651";
                }
                  if(lname=="" )
                {
                    document.getElementById("lname").style.borderColor = "#f93651";
                }  
                if(email=="")
                {
                    document.getElementById("email").style.borderColor = "#f93651";
                }
                 if(pass=="")
                {
                    document.getElementById("pass").style.borderColor = "#f93651";
                }
                if(cpass=="")
                {
                    document.getElementById("cpass").style.borderColor = "#f93651";
                }
                               
             }
             else{
                 if(pass.length<8)
                {   
                    document.getElementById('Warning').style.display="block";
                    
                    document.getElementById('spanWarningText').innerHTML="Password should be atleast 8 characters";
                    
                    
                }
                else
                {
                    
                
                 if(pass == cpass)   
          {
               if (!vcheck) {
            alert('You have to agree Term and condition');
             document.getElementById("Warning").style.display="none";
        }
        else
        {
            document.getElementById("signup").submit();
        }
          }
          else
          {
            var Warning="Conform Password Does Not Match";
                
                document.getElementById("spanWarningText").innerHTML=Warning;
                document.getElementById("Warning").style.display="block";  
                
          }
                }
            }
             
          
         }</script>
      <style>
.center_div{
    margin: 0 auto;
    width:80% /* value of your choice which suits your alignment */
}
    </style>
    
</head>
<body>

<br/>
<br/>
<br/>
    
     <div class="container col-md-4 col-md-offset-4 ">
         <h2>Sign Up</h2>
         <hr>
         <form method="post" action="SignUpBack.php" id="signup">
       
        <div class="form-group " >
    <label>First Name</label>
    <input type="text" name="fname" id="fname" class="form-control" autofocus >
        </div>
    <div class="form-group " >
    <label>Last Name</label>
    <input type="text" name="lname" id="lname" class="form-control" >
    </div>
    <div class="form-group " >
    <label>Email Address</label>
    <input type="email" name="email" id="email" class="form-control" >
    </div>
    
    <div class="form-group " >
        <label>Gender :</label>
    <div class="radio">
        <label><center><input type="radio" name="gender" value="Male" checked="checked" >Male</label>
    
        <label><input type="radio" name="gender" value="Female">Female</label>
    </div>
    </div>
       
    <div class="form-group " >
    <label>Password</label>
    <input type="password" name="password" id="pass" class="form-control"  >
    </div>
        <div class="form-group " >
    <label>Confirm Password</label>
    <input type="password" name="cpassword" id="cpass" class="form-control"  >
    </div>
            
    
    <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                            
                        </div>                                
                        </div> 
   <div class="checkbox">
    <label>
        <input type="checkbox" id="vcheck"> I agree with the <a href="#">Terms and Conditions</a>.
    </label>
  </div>
         <div class="form-group " >
             <input type="button" onclick="FormValidation()" value="Sign up" class="btn btn-primary">
    <div class="clearfix"></div>
   
</div> </form>
        </div>
<?php
include './footer.php';
