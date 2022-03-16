<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php


if(isset($_POST['save-session'])){
  session_destroy();
  header('location: LoginPDO.php '); die();
}
?>
   <form action="" method="post"><div><button name="save-session" >Sign out</a></button></div>
 <font style="color:red; text-align: center;"><h1>Chào mừng bạn đến với trang web<h1></font>
   </form>

</body>
</html>