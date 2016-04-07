<!DOCTYPE html>
<html lang="en">

<head>
    <?PHP
    error_reporting(E_ALL ^ E_DEPRECATED);
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    if(!isset($_SESSION["AID"]))
    {
        header("Location: login.php");
    }
    
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Happy Club Admin Access</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="addproduct.php">Happy Club Admin Access Panel v.2</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>-->
                        <li><a href="changePassword.php"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        
                        <?php
                        if($_SESSION["admin"]=="super"||$_SESSION["news_p"]){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> News<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addNews.php">Add News</a>
                                </li>
                                <li>
                                    <a href="viewNews.php">View News</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                        }
                        
                        ?>
                        <?php
                        if($_SESSION["admin"]=="super"||$_SESSION["event_p"]==1){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Events<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addEvent.php">Add Event</a>
                                </li>
                                <li>
                                    <a href="viewEvents.php">View Event</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                        }

                        
                        ?>
                        <?php
                        if($_SESSION["admin"]=="super"||$_SESSION["forum_p"]){
                        ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Forum<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="viewPoll.php">View Poll</a>
                                </li>
                                <li>
                                    <a href="viewReportedPosts.php">View Reported Posts</a>
                                </li>

                                
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                        }
                        if($_SESSION["admin"]=="super"){
                        ?>
                        
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i>User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="manageAdmin.php">Manage Admin</a>
                                </li>
                                <li>
                                    <a href="viewInActiveUsers.php">Manage Inactive Users</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        }
                        ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">