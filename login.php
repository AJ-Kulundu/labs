<?php  
// login codes
include_once 'DBConnector.php';
include 'User.php';

//DBConnection
$conn = new DBConnector;
if(isset($_POST['btn-login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $instance = User::create();
    $instance->setPassword($password);
    $instance->setUsername($username);
    if($instance->isPasswordCorrect()) {
        $instance->login();
    }else
    {
        header('Location:private_page.php');
        echo ""."error";
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
         <form method="post" name = "login" id="login" action="login.php">
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