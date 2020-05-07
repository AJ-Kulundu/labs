<<<<<<< HEAD
<?php
define('DB_SERVER','localhost');//local machine
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','btc3205');

class DBConnector{
    public $conn;
    function __construct(){
      $this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die("Error:".mysqli_error() );
      
    }

    public function CloseDatabase(){
        mysqli_close($this->conn);
    }
}






=======
<?php
define('DB_SERVER','localhost');//local machine
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','btc3205');

class DBConnector{
    public $conn;
    function __construct(){
      $this->conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die("Error:".mysqli_error() );
      
    }

    public function CloseDatabase(){
        mysqli_close($this->conn);
    }
}






>>>>>>> origin/master
?>