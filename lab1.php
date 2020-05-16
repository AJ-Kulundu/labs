<?php
include_once 'DBConnector.php';
include_once 'user.php';
$conn = new DBConnector;

if(isset($_POST['btn-save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];
    $username = $_POST['username'];
    $password= $_POST['password'];

    $user = new User($first_name,$last_name,$city,$username,$password);
    if(!$user->validateForm()){
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }
    $res = $user-> save();
     
    if($res){
        echo "Save was Successful";
        header("Location:login.php");
    }else{
        echo "An error occured";
    }
}




?>
<html>
    <head>
        <title>Title goes here</title>
        <script type="text/javascript" src="Validate.js"></script>
        <link rel ="stylesheet" type="text/css" href="validate.css"></link>
    </head>
    <body>
            <form method="post" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <table align="center">
                 <tr>
                     <td><input type="text" name="first_name" required placeholder="First Name">
                 </tr>
                 <tr>
                 <td><input type="text" name="last_name" placeholder="Last Name"></td>
                 </tr>
                 <tr>
                 <td><input type="text" name="city_name" placeholder="City"></td>
                 </tr>
                 <tr>
                 <td><input type="text" name = "username" placeholder="Username"></td> 
                 </tr>
                 <tr>
                 <td><input type="password" name="password" placeholder="Password"></td>
                 </tr>
                 <tr>
                 <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
                 </tr>
                 <tr>
                 <td><a href="login.php">Login</a></td>
                 </tr>
                </table>
             </form>
    </body>
</html>