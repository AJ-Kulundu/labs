
<?php
include "Crud.php";
include "authenticator.php";

class User implements Crud,authenticator{
    protected $user_id;
    protected $first_name;
    protected $last_name;
    protected $city_name;
    protected $username;
    protected $password;
     

    function __construct($first_name,$last_name,$city_name,$username,$password){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
        $this->username = $username;
        $this->password = $password;
    }

     // static constructor
     public static function create(){
        $instance = new self();
        return $instance;
    }
   
    //username setter
    public function setUsername($username){
        $this->username = $username;
    }

    //username getter
    public function getUsername(){
         return $this->username;
    }

    //password setter
    public function setPassword($password){
        $this->password = $password;
    }

    //password getter
    public function getPassword(){
        return $this-> password;
    }

    //user_id setter
    public function setUserId($user_id){
        $this->user_id= $user_id;
    }
     // user_id getter
    public function getUserId(){
        return $this->$user_id;
    }





    public function save(){
        $fn=$this->first_name;
        $ln=$this->last_name;
        $city = $this->city_name;
        $uname= $this->username;
        $this->hashPassword();
        $pass = $this->password;
        $conn = mysqli_connect("localhost","root","","btc3205");
        $res =mysqli_query($conn,"INSERT INTO users(first_name,last_name,user_city,username,password) VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error:".mysql_error());
        return $res;
    }

    public function readAll(){
        return null;
    }

    public function readUnique(){
        return null;
    }

    public function search(){
        return null;
    }

    public function update(){
        return null;
    }

    public function removeOne(){
        return null;
    }

    public function removeAll(){
        return null;
    }

    public function validateForm(){
        $fn = $this->first_name;
        $ln = $this->last_name;
        $city =$this->city_name;
        if($fn == "" || $ln=="" ||$city ==""){
            return false;
        }
        return true;
    }

    public function createFormErrorSessions(){
        session_start();
        $_SESSION['form-errors'] = "All fields are required";
    }

    public function hashPassword(){
        //inbuilt function password_hash hashes our password
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }
     
    public function isPasswordCorrect(){
        $conn = new DBConnector;
        $found = false;
        $res = mysql_query("SELECT * FROM user") or die("Error" .mysql_error());

        while($row=mysql_fetch_array($res)){
            if($this->getUsername() == $row['username']  &&  password_verify($this->getPassword(),$row['password'])){
                $found = true;
            }
        }
        //close Database Connection
        $con->closeDatabase();
        //return true
        return $found;  
    }

    public function login(){
        if($this->isPasswordCorrect()){
            header("Location:private_page.php");
        }
    }

    public function createUserSessions(){
       session_start(); 
         $_SESSION['username'] = $this->getUsername();
    }

    public function logout(){
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("Location:lab1.php");
    }
}

?>



