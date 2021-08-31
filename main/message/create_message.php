<?php
ini_set('display_errors', 1);
require_once '../../Class/Message.php';
$message = new Message();
$message->create(['title'=>$_POST['title'],'content'=>$_POST['content'],'user_id'=>(int)$_POST['user_id']]);
header('Location:../../View/index.php');
return;