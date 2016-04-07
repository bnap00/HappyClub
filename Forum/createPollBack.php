
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<?php 
include_once './header.php';
$poll = new Poll(NULL);
$items = Array();
$m = count($_REQUEST["option"]);
for ($j=0;$j<$m;$j++)
{
    $n = $_REQUEST['option'][$j];
    if($n!=null){
    array_push($items, $_REQUEST["option"][$j]);  
    }
}
$startTimestamp = "'".$_REQUEST["startDate"]." 00:00:00'";
$endTimestamp = "'".$_REQUEST["endDate"]." 23:59:59'";

$poll->setData($_REQUEST["pollTitle"], $_REQUEST["pollDesc"], $_SESSION["uid"], $startTimestamp, $endTimestamp, $items);
if($poll->save()){
    echo "Successful";
}
 else {
     echo "Failed";
}
include './footer.php';