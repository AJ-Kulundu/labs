<?php
include "Crud.php";

class User implements Crud{
    private $user_id;
    private $first_name;
    private $last_name;
    private $city_name;

    function __construct($first_name,$last_name,$city_name){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->city_name = $city_name;
    }

    //user_id setter
    public function setUserId($user_id){
        $this->user_id= $user_id;
    }

    public function getUserId(){
        return $this->$user_id;
    }





    public function save(){
        $fn=$this->first_name;
        $ln=$this->last_name;
        $city = $this->city_name;
        $conn = mysqli_connect("localhost","root","","btc3205");
        $res =mysqli_query($conn,"INSERT INTO users(first_name,last_name,user_city) VALUES('$fn','$ln','$city')") or die("Error:".mysql_error());
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

}

?>


