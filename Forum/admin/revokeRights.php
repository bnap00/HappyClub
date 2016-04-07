<?php
include './header.php';
if(isset($_SESSION["AID"])&&$_SESSION["admin"]!="super"){
    echo "You Do Not Have Proper Rights To View This Page Please Contact The System Admin To Check The Issue";
    include './footer.php';
    return;
}
if(!isset($_REQUEST["id"])){
    echo "Error Occured";
    include './footer.php';
    return;
}
if($_REQUEST["id"]==$_SESSION["AID"]){
    echo "You can't demote yourself'";
    include './footer.php';
    return;
}
?>
<h1>Revoke Rights</h1>
<h3>
    The admin will no longer be able to manage the website. Are you sure you want to remove <b>"<?php  include './memberDBLayer.php'; echo getAdminName($_REQUEST["id"]); ?>"</b>".
    This cannot be undone.
</h3>
<br/>
<a href="revokeRightsBack.php?id=<?php echo $_REQUEST["id"]; ?>" class="btn btn-success">Continue</a>
<a href="manageAdmin.php" class="btn btn-danger">Back</a>
<?php
 include './footer.php';
   
    
