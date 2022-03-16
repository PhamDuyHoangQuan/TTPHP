<?php
$conn = mysqli_connect('localhost','root','');

$a = [];

    
if(isset($_POST['mail_address'])){
    $email = $_POST['mail_address'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];

    if(empty($email) || strlen($email) >255 ){
        $a['email'] = 'Email không được bỏ trống và nhỏ hơn 255 ký tự';

    }
    if(empty($password) || strlen($password)>50 || strlen($password) < 6){
        $a['password'] ='Password từ 6 đến 50 ký tự';

    }
      if($passwordconfirm != $password){
        $a['passwordconfirm'] ='Mật khẩu nhập lại không đúng';

    }
    if(empty($a) !== false){
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(mail_address,password) VALUES('$email','$pass')";
    $query = mysqli_query($conn,$sql);
    if($query){
        header('location: LoginPDO.php ');
    }
  }   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<form method="POST" action="LoginPDO.php">
<section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Đăng Ký</h2>
            <form class="login-form">
    <div class="form-group">
        <label for="exampleInputEmail1" class="text-uppercase">Nhập Email</label>
        <input type="text" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">Nhập mật khẩu</label>
        <input type="password" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">Nhập lại mật khẩu</label>
        <input type="password" class="form-control" placeholder="">
    </div>
        <button type="submit" class="btn btn-login float-right">Đăng ký</button>
  </div>
  
  </form>
</body>
</html>