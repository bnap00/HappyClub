<?php
 include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forum</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Complete Poll List
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
                                            <th>Poll ID</th>
                                            <th>Description</th>
                                            <th>Start TimeStamp</th>
                                            <th>End Timestamp</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include './DbLayer.php';
                                            chdir("../");
                                            include './class/poll.php';
                                            
                                            $newpoll = dbLayer::getNewPolls();
                                            $oldPoll = dbLayer::getApprovedPolls();
                                            while($row = mysql_fetch_array($newpoll)){
                                                $poll = new Poll($row["PollID"]);
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $poll->getPollTitle();?></td>
                                            <td><?php echo $poll->getPollDescription(); ?></td>
                                            <td><?php echo $poll->getStartTimestamp(); ?></td>
                                            <td class="center"><?php echo $poll->getEndTimestamp(); ?></td>
                                            <td class="center"><a href="approvePoll.php?id=<?php echo $poll->getPollID();?>" class="btn btn-warning">Approve Poll</a></td>
                                            
                                        </tr>
                                        <?php
                                            }
                                            while($row = mysql_fetch_array($oldPoll)){
                                                $poll = new Poll($row["PollID"]);
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $poll->getPollTitle();?></td>
                                            <td><?php echo $poll->getPollDescription(); ?></td>
                                            <td><?php echo $poll->getStartTimestamp(); ?></td>
                                            <td class="center"><?php echo $poll->getEndTimestamp(); ?></td>
                                            <td class="center"><a href="viewPollResult.php?id=<?php echo $poll->getPollID();?>" class="btn btn-success">View results</a></td>
                                            
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
