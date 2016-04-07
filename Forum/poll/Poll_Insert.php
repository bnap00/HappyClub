<?php

?>
<html>
    <head><title>Poll </title></head>
    <body>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
    <center>
        <form method="post" action="NextPhp.php">
            <div class="options">
            <?php 
            
            for($i=0;$i<5;$i++)
            {
                echo "<input type='text' name='item[]' ><br/><br/>";
            }
            ?>
<!--            Enter 1: <input type='text' name='value1'><br/><br/>
            Enter 1: <input type='text' name='value1'><br/><br/>-->
            </div>
            <input type="button" id="add">
            <input type="submit" value="submit"><br/>
        </form>
    </center> 
    <script type="text/javascript">
            $("#add").click(function (){
                $('.options').append("<input type='text' name='item[]'><br/><br/>");
            });
        </script>
    </body>
</html>

