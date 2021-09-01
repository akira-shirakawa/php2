<?php
require_once '../../Class/Message.php';
$message = new Message();
$user_id = $_POST['user_id'];
$message->delete((int)$_POST['id']);
header("Location:../../View/user.php?id=$user_id");
return;