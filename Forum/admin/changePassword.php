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
        <h1 class="page-header">Change Account Settings</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Change Password
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form method="post" action="changePasswordBack.php">
                        <label>Admin Password</label>
                        <input class="form-control" type="password" id="adminpsk" name="adminpsk" multiple required/>
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="conpsk" name="conpsk" />
                        <br/>
                        <input type="submit" class="btn btn-success">&nbsp;<input type="reset" class="btn btn-danger">
                    </form>
                    
                </div>
            </div>
            
        </div>
        
    </div>
    </div>
</div>
<?php
include './footer.php';
