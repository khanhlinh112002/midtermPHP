<?php
    session_start();
    error_reporting(E_ALL ^ E_DEPRECATED);
    require_once('../connect.php');

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
        $res = mysqli_query($conn,$sql);

        $rows = mysqli_num_rows($res);
        if ($rows > 0)
        {
            $_SESSION['username'] = $username; // Initializing Session,Khởi tạo Session cho username
            while($row = mysqli_fetch_assoc($res)) {
                $_SESSION['id-user'] = $row['id'];
            }
            echo 'Bạn đã đăng nhập thành công';
            //header("location:../view-cart.php?ls=success");
            exit();

        } else {
            $_SESSION['error'] = 'Tên đăng nhập hoặc mật khẩu không hợp lệ!';
            echo 'Tên đăng nhập hoặc mật khẩu không hợp lệ!';
           // header("location:../user/login.php?error=wrong");
            exit();
        }
    } else {
    //    echo 'lala';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="panel-body">
						<form action="logout.php" method="post" name="form-login" accept-charset="utf-8">
							<div class="row">
								<div class="col-sm-12 col-md-10 col-md-offset-1">

									<div class="form-group">
										<input type="submit" name="submit" class="btn btn-info btn-block btn-lg" value="Đăng xuất">
									</div><!-- /form-group -->
								</div><!-- /col -->
							</div><!-- /row -->
						</form>
					</div><!-- /panel-body --></body>
</html>
 