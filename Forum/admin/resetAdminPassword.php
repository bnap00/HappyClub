<?php
include 'header.php';
?>
 <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Manage Admin</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                reset Password
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form name="addProduct" method="POST" enctype="multipart/form-data" action="resetAdminPasswordBack.php?id=<?php echo $_REQUEST["id"]; ?>">
                        <div class="form-group" id="basicDetails">
                            <label>Admin ID</label>
                            <input class="form-control"  id="adminID" name="adminID" value="<?php echo $_REQUEST["id"]; ?>" readonly disabled/>
                            <label>Admin Password</label>
                            <input class="form-control" type="password" id="newpsk" name="newpsk" required/>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="conpsk" name="conpsk" required/>
                            <br />
                        <input type="submit" class="btn btn-success" value="Add Admin">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
    </div>
</div>

