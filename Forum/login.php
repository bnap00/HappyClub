
<!DOCTYPE html>
<html lang="en">
<head>
    <?php error_reporting(E_ALL ^ E_DEPRECATED); ?>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script type="text/javascript" >

        function checkUser()
    {
            var Username=document.getElementById("txtUsername").value;
            var Password=document.getElementById("txtPassword").value;
            
            if(Username=="" || Password=="")
            { 
               
                var Warning="Please complete the fields";
                
                document.getElementById("spanWarningText").innerHTML=Warning;
                document.getElementById("Warning").style.display="block";
                
                if(Username=="" )
                {
                    document.getElementById("txtUsername").style.borderColor = "#f93651";
                }
                if(Password=="")
                {
                    document.getElementById("txtPassword").style.borderColor = "#f93651";
                }
            }
            else{
                document.getElementById("FrontMain").submit();
            }

               
        }

</script>

   

    <title>Happy Club Login</title>

    <style type="text/css">
        /*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}

.card {
    
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #txtUsername,
.form-signin #txtPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
    </style>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <br/>
    <br/>
    <div class="container">
        <div class="col-lg-4 col-lg-offset-4 " style="background-color: whitesmoke">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="img/logo.png" style="height: 200px; width: 200px;" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="loginBack.php" id="FrontMain" name="FrontMain">
                <span id="reauth-email" class="reauth-email"></span>
<!--                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>-->
                <input type="text" name="Username" id="txtUsername" class="form-control input-lg" required placeholder="Username" autofocus />
<!--                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>-->
                <input type="password" name="Password" id="txtPassword" class="form-control input-lg" required placeholder="Password" />
                
                 <div class="form-group" id="Warning" style="display: none">
                        <div class="alert-danger">
                            <span class="alert-danger-addon"><span class="glyphicon glyphicon-warning-sign"></span></span>
                            <span id="spanWarningText"></span>
                            
                        </div>                                
                        </div>
                <input type="button" class="btn btn-lg btn-primary btn-block btn-signin" onclick="checkUser()" value="Sign In" id="temp"/>
                <a href="SignUp.php" class="btn btn-lg btn-primary btn-block btn-signin">Sign Up</a>
        </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>
<?php
 require './admin/DbLayer.php';
 dbLayer::load();

  
 
  if(isset($_SESSION['LoginStatus']))
  {
                
                if($_SESSION['LoginStatus']=="failed")
                {
                $temp=$_SESSION['user'];
                
                echo "<script type='text/javascript'> document.getElementById('spanWarningText').innerHTML='Oops! it Looks as the Username or Password is InCorrect';document.getElementById('Warning').style.display='block';</script>";
                }
                echo "<script type='text/javascript'>document.getElementById('txtUsername').value='$temp'</script>";
  }  


    ?>
    
    