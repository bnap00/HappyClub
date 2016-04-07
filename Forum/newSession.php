<?php
session_start();
if(isset($_SESSION["uid"]))
{
    header("Location: index.php");
}
?>
<form action="newSessionBack.php" method="post">
    <input type="number" name="userid">
    <input type="submit">
</form>