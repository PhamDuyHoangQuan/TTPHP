<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location : login.php');
    }
?>
<html>
    <head>
        <title>Trang đăng nhập</tilte>
        <meta charset = "utf-8">
    </head>
    <body>
        Chào mừng bạn <?php echo $_SESSION['username']; ?> đã đến với trang web của chúng tôi.
    </body>
</html>