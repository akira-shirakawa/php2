<?php
ini_set('display_errors', 1);
require_once '../../Class/User.php';
$dbc = new User();
$message = $_POST;

$conf = $dbc->getData($message['email'],'email');

if(!empty($conf)){
    session_start();
    $_SESSION['email_error'] = 'すでにこのメールアドレスは登録されています。';
    header('Location:../../View/resister.php');
    return;
}
if($_POST['password_conf'] != $_POST['password']){
    session_start();
    $_SESSION['error'] = 'パスワードが一致しません';
    $_SESSION['user_name'] = $_POST['name'];
    $_SESSION['user_email'] = $_POST['email'];
    header('Location:../../View/resister.php');
    return;
}
var_dump([$_POST['password_conf'],$_POST['password']]);
$dbc->create(['name'=>$message['name'],'email'=>$message['email'],'password'=>$message['password']]);

$user_data = $dbc->getData($message['email'],'email');
session_start();
$_SESSION['user_id'] = $user_data[0]['id'];
$_SESSION['user_name'] = $user_data[0]['name'];
header('Location:../../View/index.php');
return;

