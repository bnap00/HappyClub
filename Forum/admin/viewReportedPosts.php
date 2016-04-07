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
                            Reported Posts
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
                                            <th>Post ID</th>
                                            <th>Post Title</th>
                                            <th>Justify Report</th>
                                            <th>Unjustify Reports</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        chdir("../");
                                            include './admin/DbLayer.php';
                                            
                                            include './class/post.php';
                                            
                                            
                                            $posts = dbLayer::getReportedPosts();
                                            while($row = mysql_fetch_array($posts)){
                                                $post = new Post($row["PostID"]);
                                            
                                        ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $post->getPostID()?></td>
                                            <td><?php echo $post->getPost(); ?></td>
                                            <td><a href="justifyReport.php?id=<?php echo $post->getPostID() ?>" class="btn btn-danger">Justify</a></td>
                                            <td class="center"><a href="unjustifyReport.php?id=<?php echo $post->getPostID() ?>" class="btn btn-success">Unjustify</a></td>
                                            
                                            
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
