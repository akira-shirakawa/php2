<?php
ini_set('display_errors', 1);
require_once '../../class/User.php';
$user = new User();
$id = (int)$_POST['id2'];
$sql = "update users set name=? where id = ?";
$stmt = $user->dbc()->prepare($sql);
$stmt->execute([$_POST['user_name'],$_POST['id']]);
session_start();
$_SESSION['user_name'] = $_POST['user_name'];
header("Location:../../View/user.php?id=$id");
return;
