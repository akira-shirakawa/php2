<?php
ini_set('display_errors', 1);
session_start();
require_once '../Class/User.php';
require_once '../Class/Message.php';
$user = new User();
$message = new Message();
$content = $message->getMessage();

if($_POST){
    User::bay();
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" defer ></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
<?php if($user::check()) :?>
    <div class="modal">
    <div class="modal-background"></div>
        <div class="modal-content">
            <!-- Any other Bulma elements you want -->
            <div class="box modal-css-margin">
                <form action="../Main/Message/create_message.php" method="post">
                        <p>タイトル</p>
                        <input type="text" name="title" class="input" required>
                        <p>内容</p>
                        <input type="textarea" name="content" class="input" required>
                        <input type="hidden" name="user_id" value="<?php echo($_SESSION['user_id'])?>">
                    
                        <input type="submit" value="送信" class="button">
                    </form>
            </div>
        </div>
    <button class="modal-close is-large" aria-label="close"></button>
    </div>
    <?php endif ;?>
    <nav class="navbar" role="navigation" aria-label="main navigation"> 
        <div class="mb-show">
            <?php if(!$user::check()) :?>
                <a class="button is-primary" href="resister.php">
                    <strong>Sign up</strong>
                </a>
                
                <a class="button is-light" href="login.php">
                    Log in
                </a>
                <?php else:?>   
                <button class="button is-danger js-logout-target" >
                    Log out
                </button>
            <?php endif ;?>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
                <?php if($user::check()) :?>
                <div class="navbar-item">
                <a href="user.php?id=<?php echo($_SESSION['user_id'])?>"><?php echo($_SESSION['user_name']) ?></a>
                </div>
                <?php endif ;?>
                <div class="navbar-end">
                    <div class="navbar-item">
                            <div class="buttons">
                            <?php if(!$user::check()) :?>
                                <a class="button is-primary" href="resister.php">
                                    <strong>Sign up</strong>
                                </a>
                                
                                <a class="button is-light" href="login.php">
                                    Log in
                                </a>
                             <?php else:?>   
                                <button class="button is-danger js-logout-target" >
                                    Log out
                                </button>
                            <?php endif ;?>
                            </div>
                    </div>
                </div>
        </div>
    </nav>
    <div class="columns">
        <div class="column is-one-quarter"></div>
        <div class="column">
        <div class="resister has-text-centered">
            <p class="is-size-2">投稿一覧</p>
        </div>
            <form action="" method="post" class="hidden-form"> 
                <input type="hidden" name="name" value="hoge">                
                <input type="submit" value="送信">
            </form>
            <?php if($user::check()) :?>
            <button class="button js-modal-target">新規投稿</button>
            <?php endif ;?>
            <div class="wrapper">
                <?php foreach ($content as $value) :?>
                    <div class="item">
                        <article class="message">
                            <div class="message-header">
                                <p><?php echo $value['title'] ?></p>
                            
                            </div>
                            <div class="message-body">
                            <?php echo $value['content'] ?>
                            <div class="has-text-right">
                            作成者 <a href="user.php?id=<?php echo $user->show($value['user_id'])['id']?>" class="button is-small"><?php  echo $user->show($value['user_id'])['name']?></a>
                            </div>
                            
                            </div>
                        </article>
                    </div>
                <?php endforeach ;?>
            </div>
        </div>
        <div class="column is-one-quarter"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>