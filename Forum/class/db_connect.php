<?php
class db_connect
{
    private $dblink;
    private $isConnected = false;
    function __construct() {
        ;
    }
    function __destruct() {
        $this->close();
    }
    function connect()
    {
        require_once './class/config.php';
        $dblink = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_DATABASE);
        $isConnected = true;
        return $dblink;
    }
    function connection()
    {
        return $this->dblink;
    }
    function close()
    {
        if($this->isConnected)
        {
            $isConnected=false;
            mysqli_close($dblink);
        }
    }
}

