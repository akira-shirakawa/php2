<?php
ini_set('display_errors', 1);
require_once '../../class/Message.php';
$message = new Message();
$message->create(['title'=>$_POST['title'],'content'=>$_POST['content'],'user_id'=>(int)$_POST['user_id']]);
header('Location:../../view/index.php');
return;