<?php
require_once '../../Class/Message.php';
$message = new Message();
$id2 = $_POST['id2'];
$message->delete((int)$_POST['id']);
header("Location:../../View/user.php?id=$id2");
return;