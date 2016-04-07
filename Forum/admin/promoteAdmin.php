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
?>
<h1>Promote Admin</h1>
<h3>
    Are you sure you want to add <b>"<?php include './memberDBLayer.php';   echo getAdminName($_REQUEST["id"]);?>"</b> to gain Super Admin Rights.<br/>
    This will enable him to control all the areas of the site and manage other users.
</h3>   
<br/>
<a href="promoteAdminBack.php?id=<?php echo $_REQUEST["id"]?>" class="btn btn-success">Proceed</a> &nbsp;<a class="btn btn-danger" href="./manageAdmin.php">Back</a>
<?php
   include "./footer.php";