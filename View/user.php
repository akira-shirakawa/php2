<?php
ini_set('display_errors', 1);
session_start();
require_once '../Class/User.php';
require_once '../Class/Message.php';
$id = $_GET['id'];
$user = new User();
$message = new Message();
$show = $user->show($id);
$content = $message->getData($id,'user_id');
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

    <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="mb-show">
        <a href="index.php" class="is-size-3">
                <i class="fas fa-home"></i>
        </a>
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
                <a class="navbar-item" href="index.php">
                <i class="fas fa-home"></i>
                </a>
                <?php if($user::check()) :?>
                <div class="navbar-item">
                <?php echo($_SESSION['user_name']) ?>
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

<?php if($user::check()) :?>
    <div class="modal">
    <div class="modal-background"></div>
        <div class="modal-content">
            <!-- Any other Bulma elements you want -->
            <div class="box modal-css-margin">
                <form action="../Main/Message/edit_message.php" method="post">
                        <p>????????????</p>
                        <input type="text" name="title" class="input" id="js-title-target"value=""required>
                        <p>??????</p>
                        <input type="textarea" name="content" class="input" id="js-content-target"value="" required>
                        <input type="hidden" name="user_id" value="<?php echo($_SESSION['user_id'])?>">
                        <input type="hidden" name="message_id" value="" class="js-value-target">
                        <input type="submit" value="??????" class="button">
                    </form>
            </div>
        </div>
    <button class="modal-close is-large" aria-label="close"></button>
    </div>
<?php endif ;?>
    <div class="columns">
        <div class="column is-one-quarter">
       
        </div>
        <div class="column">
        <div class="resister has-text-centered">           
            <p class="is-size-2"> <?php echo $show['name'] ?>?????????????????????</p>
        </div>
        <div class="tabs is-centered">
            <ul>
           
                <li class="is-active"><a>????????????</a></li>
                <?php if($id == ($_SESSION['user_id'] ?? '')):?>
                <li><a>????????????</a></li>
                <?php endif ;?>  
            </ul>
        </div>
       
            <form action="" method="post" class="hidden-form"> 
                <input type="hidden" name="name" value="hoge">                
                <input type="submit" value="??????">
            </form>
            <div class="wrapper">              
                <?php foreach ($content as $value) :?>
                    <div class="item">                   
                        <article class="message">
                            <div class="message-header">
                                <p><?php echo $value['title'] ?></p>
                              
                            </div>
                            <div class="message-body">
                                <p class="js-message-body-target">
                                <?php echo $value['content'] ?>
                                </p>
                                <?php if($value['user_id'] == ($_SESSION['user_id'] ?? '')) :?>

                                <button class="<?php echo $value['id'] ?> button js-modal-target">??????</button>
                                <form action="../main/message/delete_message.php" method="post" class="css-short">
                                <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                <input type="hidden" name="user_id" value="<?php echo $id  ?>">
                                <input type="submit" class="button is-danger" value="??????">
                                </form>
                                <?php endif; ?>
                            </div>
                        </article>
                    </div>
                <?php endforeach ;?>
            </div>
            <div class="box js-hidden-target is-hidden">
                <p>???????????????</p>
                <form action="../Main/User/change_user_name.php" method="post">
                <input type="text" name="user_name"value="<?php echo $_SESSION['user_name']?>" class="input" >
                <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'] ?>">
                <input type="hidden" name="id2" value="<?php echo $id ?>">
                <input type="submit" value="???????????????" class="button">
                </form>
            </div>
        </div>
        <div class="column is-one-quarter"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
</body>
</html>