<?php
include './header.php';
 if($_SESSION["admin"]!="super" && $_SESSION["forum_p"]==0){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
?>
<script type="text/javascript" src="../js/jquery.min.js"></script>

<script type="text/javascript" src="../js/polldril.js"></script>
<script type="text/javascript" src="../js/poll.js"></script>

<?php
if(isset($_REQUEST["id"])){
    chdir("../");
    include './class/poll.php';
    $poll = new Poll($_REQUEST["id"]);
    
    ?>
    <div class="panel panel-primary" style="margin:20px" >
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $poll->getPollTitle();?></h3>
        <h6><?php echo $poll->getPollDescription();?></h6>
    </div>   

	<div class="panel-body"  style="margin:0px; width:100%;">
            <div id="Main">
    <?php
    $poll->displayPollResult();
    ?>
 
            </div>    
	</div>  
</div>
    <?php
       
}
else{
    echo "Error occured";
    include './admin/footer.php';
    return;
}
 include './admin/footer.php';