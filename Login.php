<html>
    <head>
        <title>Login</title>
        <meta charset ="utf-8">
    </head>
    <body>
        <?php
            session_start();
            header('Content-type : text/html ; charset = UTF-8');
            if (isset($_POST['dangnhap'])){
           
            $username = $_POST["$username"];
            $password = $_POST["$password"];
            if ($username == "" || $password == ""){
                echo 'Tên đăng nhập hoặc mật khẩu không được để trống. <a href =javascript : history.go(-1)>Trở về</a>';
                exit;
            }
            $password = md5($password);
            $sql = "select * from user where username = '$username' and password = '$password'";
            $result = mysqli_query($connect, $query) or die( mysqli_error($connect));
            if ($result){
                echo 'Đăng nhập thất bại';
            }else {
                echo 'Đăng nhập thành công';
            }
            $row = mysqli_fetch_array($result);
            if ($password != $row['password']){
                echo 'Mật khẩu không đúng, vui lòng nhập lại';
                exit;
            }
            $_SESSION['username'] = $username;
                echo "Xin chào <br>" .$username . "</br>. Bạn đã đăng nhập thành công. <a href = ''>Thoát</a>";
            }
        ?>
        <form method ="POST" action="Login.php">
            <fieldset>
                <legend>Đăng nhập</legend>
                <table>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td><input type = "text" name ="tendangnhap" size ="255"></td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td><input type = "password" name ="matkhau" size ="50"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align ="center">
                            <input type = "submit" name = "btn_submit" value ="Đăng nhập">
                    </tr>
                </table>
            </fiedset>
        </form>
    </body>
</html>