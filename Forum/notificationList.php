
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<?php
$flag = true;
include './header.php';
$user = new user($_SESSION["uid"]);
$user->getNotification();
?>
<br/>
<?php
include './footer.php';
