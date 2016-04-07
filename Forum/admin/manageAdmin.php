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
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Manage Admin
            </div>
            <div class="panel-body">
                <p align="right"><a href="addAdmin.php" class="btn btn-success">Add Admin</a><br/></p>  
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                        <th>ID</th>
                        <th>Admin Name</th>
                        <th>Privilages</th>
                        <th>Revoke</th>
                        </tr>
                        <?php
                        include './DBFile.php';
                        $con = mysqli_connect($DB_host, $DB_user, $DB_password, $DB_name);
                        $res = mysqli_query($con,"SELECT * FROM `admin`");
                        while ($row = mysqli_fetch_array($res))
                        {
                            echo "<tr";
                            if($row["AdminType"]==1){
                                echo " class=active";
                            }
                            echo ">";
                                
                            echo "<td>".$row["AdminID"]."</td><td>".$row["AdminName"]."</td>";
                            echo "<td>";
                            
                                
                            
                            if($row["AdminType"]=="1"){
                                if($row["AdminID"]!=$_SESSION["AID"]){
                                    echo "<a class='btn btn-danger' href=demoteAdmin.php?id=".$row["AdminID"].">Demote To Sub-Admin</a>";
                                }
                                else{
                                    echo "-";
                                }
                            }else{
                                echo "<form action='changeAdminPrivilages.php?id=".$row["AdminID"]."' method=post>";
                                echo "<input type='checkbox' name='newsprivilages'";
                                if($row["newsPrivilages"]==1){
                                    echo "checked";
                                }
                                echo ">News Privilages <br />";

                                echo "<input type='checkbox' name='eventsprivilages'";
                                if($row["eventPrivilages"]==1){
                                    echo "checked";
                                }
                                echo ">Event Privilages <br />";


                                echo "<input type='checkbox' name='forumprivilages'";
                                if($row["forumPrivilages"]==1){
                                    echo "checked";
                                }
                                echo ">Forum Privilages <br />";
                                echo "<input class='btn btn-success' type='submit' value='Change Privilages'> <br/>";
                                echo "</form>";
                                echo "<a class='btn btn-success' href=promoteAdmin.php?id=".$row["AdminID"].">Promote To Super-Admin</a>";
                            }

                            
                            echo "</td>";
                            if($_SESSION["AID"]==$row["AdminID"]){
                               echo "<td><a href='#' class='btn btn-success'>You</a></td>";
                            }
                            else{
                                echo "<td><a href='revokeRights.php?id=".$row["AdminID"]."' class='btn btn-danger'>Revoke Rights</a></td>";
                            }
                            echo "</tr>";
                        }



                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './footer.php';
?>
