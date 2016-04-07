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
<h1>Demote User</h1>
<h3>
    The admin will no longer be able to manage another administrators,
    The admin will only be able to change only the assigned settings.
</h3>
<br/>
<form name="assignnewprivilages" method="POST" action="demoteAdminBack.php?id=<?php echo$_REQUEST["id"] ?>">
    <div class="form-group" id="basicDetails">
        <div class="form-group">
            <label>Select Privilages For The Demoted Admin</label>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="newsprivilages">News Privilages
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="eventsprivilages">Event Privilages
                </label>
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="forumprivilages">Forum Privilages
                </label>
            </div>
        </div>
    <input type="submit" class="btn btn-success" value="Confirm">
    
</form>
<?php
include './footer.php';