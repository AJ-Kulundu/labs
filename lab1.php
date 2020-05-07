<?php
include_once 'DBConnector.php';
include_once 'user.php';
$conn = new DBConnector;

if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];

    $user = new User($first_name,$last_name,$city);
    $res = $user-> save();
     
    if($res){
        echo "Save was Successful";
    }else{
        echo "An error occured";
    }
}


?>
<html>
    <head>
        <title>Title goes here</title>
        <script type = "text/javascript" src = "Validate.js"></script>
    </head>
    <body>
            <form name="user_details" id = "user_details" method="post" onsubmit="return validateForm()" action="<?=$_SERVER['PHP_SELF']?>">
                <table align="center">
                 <tr>
                     <td><input type="text" name="first_name" placeholder="First Name"></td>
                 </tr>
                 <tr>
                 <td><input type="text" name="last_name" placeholder="Last Name"></td>
                 </tr>
                 <tr>
                 <td><input type="text" name="city_name" placeholder="City"></td>
                 </tr>
                 <tr>
                 <td><input type ="submit" name= "btn-save" value= "SAVE"></td>
                 </tr>
                </table>
             </form>
    </body>
</html>