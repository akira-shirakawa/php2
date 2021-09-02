<?php
ini_set('display_errors', 1);
require_once '../../Class/Message.php';
$user = new Message();
$id = (int)$_POST['user_id'];
$sql = "update messages set title=? ,content=? where id = ?";
$stmt = $user->dbc()->prepare($sql);
$stmt->execute([$_POST['title'],$_POST['content'],$_POST['message_id']]);

header("Location:../../View/user.php?id=$id");
return;
