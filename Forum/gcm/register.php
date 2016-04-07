<?php
chdir("../");
// response json
$json = array();
 
/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_POST["regId"])) {
    $gcm_regid = $_POST["regId"]; // GCM Registration ID
    // Store user details in db
    include_once './class/db_functions.php';
    include_once './gcm/GCM.php';
 
    $db = new DB_Functions();
    $gcm = new GCM();
 
    $newId = $db->storeUser($gcm_regid);
    if($newId){
        echo $newId;
    }
   
   
 
    
} else {
    echo "missing parameters";
    // user details missing
}