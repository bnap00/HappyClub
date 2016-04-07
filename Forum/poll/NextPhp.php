<?php

 
   $m = count($_REQUEST['options']);
$a=0;
$to="";
$t=0;
$items = Array();
        for ($j=0;$j<$m;$j++)
{
        $n = $_POST['item'][$j];
        if($n!=null){
            array_push($items, $_POST["item"][$j]);  
        }
        else{
            
        }
    }
    
    $m = count($items);
for ($j=0;$j<$m;$j++)
{
        $n = $items[$j];
        if($m-$j==1){
           
            $to.=$n;
        }else{
            
        $to .=$n.",";}
        
        }
    
    
if($to!=null){
$nm = explode(",",$to);
 $cy = count($nm);
for($i=0;$i<$cy;$i++)
{
echo "<br/><input type='checkbox' name='$nm[$i]' value='$nm[$i]'>$nm[$i]<br/>";
    }}
?>
