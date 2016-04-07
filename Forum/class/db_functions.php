<?php
 
class DB_Functions {
 
    private $db;
    private $dblink;
    //put your code here
    // constructor
    function __construct() {
        include_once './class/db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->dblink=$this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($gcm_regid) {
        // insert user into database
        
        $result = mysqli_query($this->dblink,"INSERT IGNORE INTO gcm_users(UID,gcm_regid) VALUES(null, '$gcm_regid')");
        // check for successful store
        if ($result) {
            // get user details
             return $id = mysqli_insert_id($this->dblink); // last inserted id
            
        } else {
            return false;
        }
    }
 
    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysqli_query($this->dblink, "select * FROM gcm_users");
        return $result;
    }
    
    public function queryDB($sql)
    {
        $this->db->close();
        $this->dblink=$this->db->connect();
        $res = mysqli_query($this->dblink, $sql);
        $this->db->close();
        return $res;
    }
    
    
    
}
 