<?php
require_once '../Class/User.php';
session_start();
$error = $_SESSION['error'] ?? '';
$email_error = $_SESSION['email_error'] ?? '';
$user_name = $_SESSION['user_name'] ?? '';
$user_email = $_SESSION['user_email'] ?? '';
$_SESSION = array();
session_destroy();
$user = new User();
$user::redirect('index.php');

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
    <title>resister</title>
</head>
<body>
    <nav class="navbar" role="navigation" aria-label="main navigation"> 
    <div class="mb-show">
    <a href="index.php" class="is-size-3">
                <i class="fas fa-home"></i>
    </a>
           
               
                
                <a class="button is-primary" href="login.php">
                    Log in
                </a>
              
             
            
    </div> 
        <div id="navbarBasicExample" class="navbar-menu">
                <a class="navbar-item" href="index.php">
                <i class="fas fa-home"></i>
                </a>
                <div class="navbar-end">
                    <div class="navbar-item">
                            <div class="buttons">
                         
                               
                                
                                <a class="button is-light" href="login.php">
                                    Log in
                                </a>
                       
                            </div>
                    </div>
                </div>
        </div>
    </nav>
  
    <div class="columns">
        <div class="column"></div>
        <div class="column">
            <div class="resister has-text-centered">
            <p class="is-size-2">????????????</p>
            </div>
            <div class="box">
            <?php echo  $error ?>
            <?php echo $email_error ?>        
                <form action="../Main/User/user_resister.php" method="post">
                    <p>??????</p>
                    <input type="text" name="name" class="input" value="<?php echo $user_name ?>" required>
                    <p>?????????????????????</p>         
                    <input type="email" name="email" class="input" value="<?php echo $user_email ?>" required>
                    <p>???????????????</p>
                    <input type="password" name="password" class="input" required>
                    <p>?????????????????????</p>
                    <input type="password" name="password_conf" class="input" required>
                    <input type="submit" value="??????"class="button">
                </form>
            </div>
        </div>
        <div class="column"></div>
    </div>
</body>
</html>