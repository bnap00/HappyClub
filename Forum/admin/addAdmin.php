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
                Add Admin
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form name="addAdmin" method="POST" enctype="multipart/form-data" action="addAdminBack.php">
                        <div class="form-group" id="basicDetails">
                            <label>Admin Name</label>
                            <input class="form-control"  id="adminName" name="adminName" />
                            <label>Admin Password</label>
                            <input class="form-control" type="password" id="adminpsk" name="adminpsk" multiple required/>
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="conpsk" name="conpsk" />
                            <br/>
                            <div class="form-group">
                                <label>Privilages</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="superadmin">Superadmin<br/><p class="help-block">Giving Super Admin Rights Will Allow All The Permissions To The Admin</p>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="newsprivilage">News Privilages
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="eventsprivilage">Event Privilages
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="forumprivilage">Forum Privilages
                                    </label>
                                </div>
                            </div>
                        <input type="submit" class="btn btn-success" value="Add Admin">
                        <input type="reset" class="btn btn-danger" value="Reset">
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
    </div>
</div>
<?php
include './footer.php';
?>