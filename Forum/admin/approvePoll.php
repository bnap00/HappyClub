<?php
 include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
require './DbLayer.php';
$PollId =$_REQUEST['id'];
$PollStatus = dbLayer::getStatusCode($PollId);
if($PollStatus == 0)
{
echo "<center><h2>Poll Details </h2></center>";
$PollDetails = dbLayer::getPolldetails($PollId);
     while ($row = mysql_fetch_array($PollDetails)) {
         $_SESSION['pollid']=$row[0];
         ?>
         <div class="container table-responsive">
            <table class="table table-bordered table-hover span5 center-table">
             <tbody>
                 <tr>
                     <td>Posted By</td>
                     <td><?php
                         $UserID = dbLayer::getUserName($row[1]);
                            while ($user = mysql_fetch_array($UserID)) {
                             echo $user[0]." ".$user[1];   
                            }
                        ?>
                     </td>
                 </tr>
                <tr>
                    <td> <?php echo "Title";?></td>
                    <td ><h3 class="panel-title"><?php echo $row[2]?></h3></td>
                </tr>
                <tr>
                    <td> <?php echo "Description";?></td>
                    <td> <?php echo $row[3]?></td>
                </tr>
                <tr>
                    <td>Options</td>
             <form id="voteform" action="FinalAdminPanel.php" method="post">
                            <ul class="list-group">
                            <?php
                                $options = Array();
                                $options = explode(",",$row["4"]);
                                $count=count($options);
                            echo"<td>";
                                for($i=0;$i<$count;$i++)
                                { ?>
                                    <li class="ist-group-item" style="margin:0px; width:100%; ">
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="poll:<?php echo $row[0]; ?>" value="<?php echo $options[$i];?>">
                                       <?php echo $options[$i]?>
                                        </label>
                                    </div>
                                    </li>
                                <?php   }   ?>
                            </td>
                            </ul>
                        </form>
                </tr>
                <tr>
                    <td>StartTimeStamp</td>
                    <td><?php echo $row[5]?></td>
                </tr>
    
                <tr>
                    <td>EndTimeStamp</td>
                    <td><?php echo $row[6]?></td>
                </tr>
                <tr>
                    <td><a href="approvePollBack.php?id=<?php echo $PollId; ?>"><button class="btn btn-primary btn-lg">Approve Poll</button></a>
                    </td>
                    <td>
                        <a href="disapprovePoll.php?id=<?php echo $PollId; ?>"><button class="btn btn-primary btn-lg"> Disapprove Poll</button></a>
                    </td>
                </tr>
                    
                              
                <?php } 
 include './footer.php';          
    }