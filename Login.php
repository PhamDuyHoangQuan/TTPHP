<?php
session_start();

?>

<?php
  

  if(isset($_POST['Email'])){
  $_SESSION["Email"] = $_POST['Email'];
}
 if(isset ($_POST['password'])){
 $_SESSION["password"] = $_POST['password'];
}
  $a = $b ="";
  if(isset($_POST['email'])){
    $a = $_POST['email'];
  }
   if(isset ($_POST['password'])){
    $b = $_POST['password'];
  }
  if(!empty($a) && !empty($b)){

  if(strlen($a) > 255){
    echo ' gmail nhỏ hơn 255 ký tự';
  }
 if(strlen($b) < 3 || strlen($b) > 255) {
    echo 'Mật Khẩu lớn hơn 3 và nhỏ hơn 255 ký tự ';
}
  elseif($a =='quanbin@gmail.com' && $b == 'quanbin'){
    header('location: LoginSuccess.php '); 
    die();
  }
  else{
    echo ' Đăng nhập thất bại';
  }

}
?>
	<form method="POST" action="Login.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="225"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>
