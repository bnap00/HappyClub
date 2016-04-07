<?php
include_once './header.php';
echo "<br/>";
?>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<?php
if(!isset($_REQUEST["pid"])){
    header("Location: index.php");
}
$post = new Post($_REQUEST["pid"]);
if(!$post->getPostID())
{
   die("error"); 
}
if($post->getParentID()){
    die ("error");
}
echo "<h2>".$post->getPost()."</h2>";
echo "<hr>";
$reply = $post->getReplies();
if($reply){
    while($re = array_pop($reply)){
        $re->displayPost();
    }
}
if($_SESSION["activeStatus"]==0){
    echo "You Have Not Activated Your Account Or You Cannot View This Page As You Are Banned From The Forum<br /> Activate Your Account By Link Given On Mail Sent To Your Email Address or Contact Admin To Restore Your Rights <a href='index.php>Go'";
    return;
}
else{
?>
<hr>
<form action="postAnswerBack.php?pid=<?php echo $_REQUEST["pid"];?>" method="post">
    <label>Answer This Question</label><textarea class="form-control" name="reply" cols="5" required></textarea><input type="submit">
</form>
<?php
}
include './footer.php';