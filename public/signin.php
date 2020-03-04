<?php
$username = $_POST['username'];
$password = $_POST['password'];

addslashes($username);
addslashes($password);
include './controller.php';
$user = new login($username,$password);
$status = $user -> verifyuser();
if($status == 1){
#    echo 'successed';
#    die();
    $_SESSION['user'] = $username;
    header('Location:/personal.php');
}
else{
    echo '<h1>登陆失败,用户名或密码错误</h1>';
}
?>
