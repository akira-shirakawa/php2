<?php
ini_set('display_errors', 1);
require_once '../../Class/User.php';
$dbc = new User();
$message = $_POST;

$conf = $dbc->getData($message['email'],'email');
var_dump($conf);
if($conf[0]['email'] == $_POST['email'] && $conf[0]['password'] == $_POST['password']){
    session_start();
    $_SESSION['user_id'] = $conf[0]['id'];
    $_SESSION['user_name'] = $conf[0]['name'];
    header('Location:../../View/index.php');
    return;
}
session_start();
$_SESSION['login_error'] = 'パスワードまたはメールアドレスが正しくありません';
header('Location:../../View/login.php');
return;


