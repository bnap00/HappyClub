<?php
header('Access-Control-Allow-Origin: *');	
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, REQUEST");
header("Access-Control-Allow-Headers : X-Requested-With");
header("Access-Control-Allow-Headers : Content-Type, x-xsrf-token");
header("Content-Type : application/json");
header("Access-Control-Max-Age", 172800);

// set up the connection variables
$db_name  = 'happyclubdb';
$hostname = '127.0.0.1';
$username = 'root';
$password = '';

		
		
		
// connect to the database
$dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);

		
$sql = "";
// a query get all the records from the users table
if(isset($_REQUEST["request"])){

    if($_REQUEST["request"]=="list"){
        if(isset($_REQUEST["item"])){
            if($_REQUEST["item"]=="news"){
                $sql = "select * from newslist";
            }
            else if($_REQUEST["item"]=="event"){
                $sql="select * from event";
            }
        }
    }
    else if($_REQUEST["request"]=="detail"){
        if(isset($_REQUEST["item"])){
            if($_REQUEST["item"]=="news"){
                if(isset($_REQUEST["id"])){
                    $sql = "select * from newslist where NewsID=".$_REQUEST["id"];
                }
            }
            if($_REQUEST["item"]=="event"){
                if(isset($_REQUEST["id"])){
                    $sql = "select * from event where EventID=".$_REQUEST["id"];
                }
            }
        }
    }
    else if ($_REQUEST["request"]=="register") {
        if(isset($_REQUEST["regId"])){
            $gcm_regid = $_REQUEST["regId"];
            $sql = "INSERT IGNORE INTO gcm_users(UID,gcm_regid) VALUES(null, '$gcm_regid')";
        }
    }
    else if($_REQUEST["request"]=="unregister"){
        if(isset($_REQUEST["regId"])){
            $sql = "DELETE IGNORE FROM gcm_users WHERE gcm_regid ='".$_REQUEST["regId"]."'";
        }
    }
    else if($_REQUEST["request"]=="image"){
        header('Content-Type: image/jpeg');
        if(isset($_REQUEST["item"])){
            if($_REQUEST["item"]=="news"){
                if(isset($_REQUEST["id"])){
                    
                        readfile("../newsImg/".$_REQUEST["id"].".jpg");
                   
                }
            }
            if($_REQUEST["item"]=="event"){
                if(isset($_REQUEST["id"])){
                    readfile("../eventImg/".$_REQUEST["id"].".jpg");
                 }
            }
            
        }
        return;
    }
    else if($_REQUEST["request"]=="forum"){
        header('Content-Type: text/html');
        ?><iframe style="width: 100%;height: 100%;" src="../index.php"><?php
                return;
    }

}
    


// use prepared statements, even if not strictly required is good practice
        $stmt = $dbh->prepare( $sql );

        // execute the query
        $stmt->execute();

        // fetch the results into an array
        $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

        // convert to json
        $json = json_encode( $result );

        // echo the json string
        echo $json;
?>