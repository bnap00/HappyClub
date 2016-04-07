<?php
 include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["news_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <style>
                                        td{
                                            white-space: pre;
                                            max-width: 200px;
                                            word-wrap: break-word;
                                        }
                                    </style>
                                    
                                    <thead>
                                        <tr>
                                            <th>Event ID</th>
                                            <th>Event Name</th>
                                            <th>Event Title</th>
                                            <th>Description </th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include './DbLayer.php';
                                            $result = dbLayer::getEvent();
                                            while($row = mysql_fetch_array($result)){
                                                
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $row["EventID"] ?></td>
                                            <td><?php echo $row["EventName"] ?></td>
                                            <td><?php echo $row["Title"] ?></td>
                                            <td class="center"><?php echo $row["Description"] ?></td>
                                            <td class="center"><?php echo $row["StartDate"] ?></td>
                                            <td class="center"><?php echo $row["EndDate"] ?></td>
                                            <td><a href="eventUpdate.php?id=<?php echo $row["EventID"]; ?>" class="btn btn-success">Update</a></td>
                                            <td><a href="deleteEvent.php?id=<?php echo $row["EventID"]?>" class="btn btn-danger">Delete</a></td>
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
