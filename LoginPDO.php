<?php
session_start();
$conn = mysqli_connect('localhost','root','');

$a =[];
if(isset($_POST['mail_address'])){
    $email = $_POST['mail_address'];
    $password = $_POST['password'];

    if(empty($email) || strlen($email) >255 ){
        $a['email'] = 'Email không được bỏ trống và nhỏ hơn 255 ký tự';

    }
    if(empty($password) || strlen($password)>50 || strlen($password) < 6){
        $a['password'] ='password từ 6 đến 50 ký tự';
    }
    $sql = "SELECT*FROM  users WHERE mail_address = '$email'";
  
    $query = mysqli_query($conn,$sql);
  
    $data = mysqli_fetch_assoc($query);
    
    $checkEmail = mysqli_num_rows($query);
    if($checkEmail != 0){

    	$checkPass = password_verify($password, $data['password']);

    	if($checkPass !== false){
    		echo 'đúng';
    		$_SESSION['user'] = $data;
    		header('location: LoginsuccessPDO.php  ');
    	}else{
    		$a['checkPass'] = 'Password sai ';
    	}

    }
    else{
    	$a['checkEmail'] = 'Email không tồn tại';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</head>

<body>
<div id="login-overlay" class="modal-dialog">
 <div class="modal-content">
  <div class="modal-header">
   <h4 class="modal-title" id="myModalLabel">Đăng Nhập</h4>
  </div>
  <div class="modal-body">
   <div class="row">
    <div class="col-xs-6">
     <div class="well">
      <form id="loginForm" method="POST" action="hoangquan@gmail.com" >
       <div class="form-group"><label for="username" class="control-label">Tài khoản</label><input class="form-control" id="username" name="username" value="" title="Xin vui lòng nhập tên tài khoản" placeholder="hoangquan@gmail.com" type="text"> 
       </div>
       <div class="form-group"><label for="password" class="control-label">Mật khẩu</label><input class="form-control" id="password" name="password" value="" title="Xin vui lòng nhập mật khẩu" type="password">
       </div>
       <div id="loginErrorMsg" class="alert alert-error hide">Sai tên tài khoản hay mật khẩu</div>
       <div class="checkbox"><label>
                 <input name="remember" id="remember" type="checkbox">
                 Remember Me </label>
       </div>
       <button type="submit" class="btn btn-success btn-block">Đăng nhập</button><a href="hoangquan@gmail.com" class="btn btn-default btn-block">Quên mật khẩu?</a>
      </form>
     </div>
    </div>
</body>

</html>