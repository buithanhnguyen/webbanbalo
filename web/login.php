<?php
	//include "../includes/connect.php";
	session_start();
?>


-->
<!DOCTYPE html>
<html>

<head>
	<title>Big shope A Ecommerce Category Flat Bootstarp Resposive Website Template | Login :: w3layouts</title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!--theme-style-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script src="js/jquery.min.js"></script>
</head>

<body>
	<!--header-->
	<div class="header">
		<?php
			include "../includes/header.php";
		?>
	</div>

	<!--CONTENT-->
	<div class="container">

		<div class="account_grid">
			<div class=" login-right">
				<h3>REGISTERED CUSTOMERS</h3>
				<p>If you have an account with us, please log in.</p>
				<form action="login.php" method="POST" enctype="application/x-www-form-urlencoded">
					<div>
						<span>Username<label>*</label></span>
						<input type="text" name="Username" >
					</div>
					<div>
						<span>Password<label>*</label></span>
						<input type="password" name="Password" >
					</div>
					<a class="forgot" href="#">Forgot Your Password?</a>
					<input type="submit" name="submitLogin" value="Login">
				</form>
			</div>
			<div class=" login-left">
				<h3>NEW CUSTOMERS</h3>
				<p>By creating an account with our store, you will be able to move through the checkout process faster,
					store multiple shipping addresses, view and track your orders in your account and more.</p>
				<a class="acount-btn" href="register.html">Create an Account</a>
			</div>
			<div class="clearfix"> </div>
		</div>

		<!-- Menu -->
		<div class="sub-cate">
			<?php
				include "../includes/menuleft.php";
			?>
		</div>
		<div class="clearfix"> </div>
	</div>

	<!--FOOTER-->
	<div class="footer">
		<?php
			include "../includes/footer.php";
		?>
	</div>
</body>

</html>


<?php
    if (isset($_POST['submitLogin'])) 
    {
        include '../includes/connect.php';
         
        //Lấy dữ liệu nhập vào
        $username = isset($_POST['Username'])?$_POST['Username']:'';
        $password = isset($_POST['Password'])?$_POST['Password']:'';
        $para=array();
        $para[]=$username;
		//var_dump($para); exit;
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
            echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
         
        // mã hóa pasword
        $password = md5($password);
         
        //Kiểm tra tên đăng nhập có tồn tại không
        //$query = mysql_query("SELECT * FROM admin WHERE username='$username'");
        $sql="select * from admin where username='$username'";
        $stmt=$conn->prepare($sql);
        $stmt->execute($para);
        $admin=$stmt->fetch(PDO::FETCH_ASSOC);
        //var_dump($admin);
        
        
        if ($username != $admin['username']) {
            echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
         
        //Lấy mật khẩu trong database ra
        //$row = mysql_fetch_array($query);
         
        //So sánh 2 mật khẩu có trùng khớp hay không
        if ($password != $admin['matkhau']) {
            echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
        }
         
        //Lưu tên đăng nhập
        $_SESSION['username'] = $username;
        echo '<script language="javascript">'; 
		echo 'alert("Đăng Nhập Thành Công !!! ")'; 
		echo '</script>';
        echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='indexAdmin.html'>VÀO TRANG ADMIN</a>";
        echo '<script type="text/javascript">
           window.location = "index.php"
      		</script>';
        die();
    } ?>