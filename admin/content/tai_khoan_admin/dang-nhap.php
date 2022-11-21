<?php
include_once"../../../chat_app_php-main/part/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../../css/tai-khoan/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../../css/tai-khoan/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<!-- CODE XỬ LÝ PHP -->
	<?php	
		$lifetime = 60*60*24*365;
        session_set_cookie_params($lifetime,'/');
        session_start();
        
		require_once ('./admin.php');
		// require_once ('./dangnhap_xuly.php');

		extract($_REQUEST);
		if(array_key_exists('btn_login1',$_REQUEST)){
			$user1 = admin_select_by_id($ma_ad);
			$mat_khau1 = md5(addslashes($_POST['mat_khau']));
			if($user1){
		// 		if($user1['mat_khau'] == $mat_khau){
		// 			if($user1['vai_tro'] == 0){
		// 				$_SESSION['user1'] = $user1;
		// 				header("location: ../thong-ke/thong-ke-list.php");
		// 			}
		// 			if($user['vai_tro'] == 0){
		// 				$_SESSION['user1'] = $user1;
		// 				header("location: ../thong-ke/thong-ke-list.php");
		// 			}
		// 		}
		// 	}
		// }
				if($user1['mat_khau'] == $mat_khau1){
				$_SESSION['ma_ad']=$ma_ad;
				$_SESSION['mat_khau']=$mat_khau1;
				if($user1['vai_tro'] == 1) {
					$_SESSION['user1'] = $user1;
				}
				if($user1['vai_tro'] == 0) {
					$_SESSION['user1'] = $user1;
				}
				if(isset($_POST['remember']) and ($_POST['remember']=="on")){
					setcookie("ma_ad", $ma_ad, time() +60);
					setcookie("mat_khau", $mat_khau, time() + 60);
					setcookie("vai_tro", $user1, time() +60);
				}
				echo "<script>alert('Login Successfull.');
				 location.href='../thong-ke/thong-ke-list.php';</script>";
			}
			}else{
				echo '<script language="javascript">';
				echo 'alert("Sai tên tài khoản hoặc mật khẩu")';
				echo '</script>';
			}
		}
	?>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../../css/tai-khoan/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method = "post">
					<span class="login100-form-logo">
					<a href="../index.php"><img src="../../../css/tai-khoan/images/logo.png" width = "80px" alt=""></a>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						ĐĂNG NHẬP
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="ma_ad" placeholder="Tên đăng nhập">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="mat_khau" placeholder="Mật khẩu">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1" checked>
							Ghi nhớ mật khẩu ?
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type = "submit" name = "btn_login1">
							XÁC NHẬN
						</button>
					</div>

					<div class="text-center p-t-90">
						<!-- <a class="txt1" href="dang-ky.php">
							Đăng ký?&nbsp;
						</a>
						OR -->
						<a class="txt1" href="quen-mk.php">
						&nbsp;Quên mật khẩu?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/bootstrap/js/popper.js"></script>
	<script src="../../../css/tai-khoan/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../../css/tai-khoan/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../../css/tai-khoan/js/main.js"></script>

</body>
</html>