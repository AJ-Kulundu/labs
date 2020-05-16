<?php  
// login codes
include_once 'DBConnector.php';
include_once 'User.php';

//DBConnection
$con = new DBConnector;
if(isset($_POST['btn-login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    User::create();
    $instance->setUsername($username);
    $instance->setPassword($password);

    if($instance->isPasswordCorrect()){
        $instance->login();
        //close database connection
        $con->CloseDatabase();
        //next create a user session
        $instance->createUsersession(); 
    }else{
        $con->CloseDatabase();
        header("Location: login.php");
    }
}
?>
<html>
     <head>
        <title>Title goes here</title>
        <script>type = "text/javascript" src="Validate.js"</script>
        <link  rel= "stylesheet" type="text/css" src="validate.css">
     </head>
     <body>
         <form method="post" name = "login" id="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <table align="center">
            <tr>
            <td><input type="text" name = "username"  required placeholder="Username" ></td>
            </tr>
            <tr>
            <td><input type="password" name = "password" required placeholder="Password"></td>
            </tr>
            <tr>
            <td><button type="submit" name="btn-login"><strong>LOGIN</strong></td>
            </tr>
            </table>
         </form>
     </body>

</html>