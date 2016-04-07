<?php
 include './header.php';
 if($_SESSION["admin"]!="super"){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complete List of InActive Or Banned Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <style>
                                        td{
                                            white-space: pre;
                                            max-width: 300px;
                                            word-wrap: break-word;
                                        }
                                    </style>
                                    
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Email</th>
                                            <th>First Name</th>
                                            <th>Last Name </th>
                                            <th>Gender</th>
                                            <th>Operation</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include './DbLayer.php';
                                            $new = dbLayer::getInactiveUsers();
                                            while($row = mysql_fetch_array($new)){
                                                
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $row["UserID"] ?></td>
                                            <td><?php echo $row["Email"] ?></td>
                                            <td><?php echo $row["FirstName"] ?></td>
                                            <td class="center"><?php echo $row["LastName"] ?></td>
                                            <td class="center"><?php echo $row["Gender"] ?></td>
                                            <td class="center"><a href="activateUser.php?id=<?php echo $row["UserID"]; ?>" class="btn btn-success">Activate</a></td>
                                           
                                        </tr>
                                        <?php
                                            }
                                            $banned= dbLayer::getBannedUsers();
                                            while($row = mysql_fetch_array($banned)){
                                                
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $row["UserID"] ?></td>
                                            <td><?php echo $row["Email"] ?></td>
                                            <td><?php echo $row["FirstName"] ?></td>
                                            <td class="center"><?php echo $row["LastName"] ?></td>
                                            <td class="center"><?php echo $row["Gender"] ?></td>
                                            <td class="center"><a href="unbanuser.php?id=<?php echo $row["UserID"]; ?>" class="btn btn-danger">Un Ban</a></td>
                                           
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
