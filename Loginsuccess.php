<?php


if(isset($_POST['save'])){
  session_destroy();
  header('location: Login.php '); 
  die();
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