<?php
    //chdir("../");
    include_once './gcm/GCM.php';
    include_once './class/db_functions.php';
    //$message = $_REQUEST["message"];
    $message = array("message" => $message);
    $gcm = new GCM();
    $db = new DB_Functions();
    $users = $db->getAllUsers();
    $userCount = mysqli_num_rows($users);
    $registatoin_ids = array();
    $arrayCount = 0;
    //echo $message["message"];
    while($id = mysqli_fetch_array($users))
    {
        array_push($registatoin_ids,  $id["gcm_regid"]);
        $arrayCount++;
        if($arrayCount>998)
        {
            
            $result = $gcm->send_notification($registatoin_ids, $message);
            unset($registatoin_ids);
            $registatoin_ids = array();
            
            echo $result;
            $arrayCount=0;
        }
        //echo $arrayCount;
        
    }
    
    $gcm->send_notification($registatoin_ids, $message);
    
    
    
    
     
    
 
    //$registatoin_ids = array($regId);
    
 
    

