<?php
require_once '../../class/Message.php';
$message = new Message();
$id2 = $_POST['id2'];
$message->delete((int)$_POST['id']);
header("Location:../../view/user.php?id=$id2");
return;