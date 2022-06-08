<?php
	include '../../common/connectSQL.php';

	$message = null;
	if (isset($_POST['submit'])) {
		$username = $_POST['UserName'];
		$password = $_POST['PasswordHash'];
		$fullName = $_POST['FullName'];
		$email = $_POST['Email'];
		$phone = $_POST['PhoneNumber'];
		$role = 'user';
		$address = $_POST['Address'];		
		$created_date = $date = gmdate("Y-m-d H:i:s", time()+7*60*60);

		$sql = "INSERT INTO users(user_name, full_name, password, email, phone, role, address, created_date) VALUES('$username', '$fullName', '$password', '$email', '$phone', '$role', '$address', '$created_date')";
		$result = mysqli_query($conn, $sql);
		
		if ($result==1) {
			$message = "Bạn đã tạo tài khoản thành công";
		} else {
			$message = "Đã có lỗi xảy ra, vui lòng thử lại sau";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Trang chủ</title>
		<!-- fontawesome - icon -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<!-- bootstrap -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
			crossorigin="anonymous"
		/>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"
		></script>

		<!-- style chung -->
		<link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/register.css" />
	</head>
	<body>
		<!-- Header -->
		<?php include 'common/header.php'?>

		<!-- form dang ki -->
		<div class="container">

			<div class="login-form">
				<div class="login-bg">
					<img src="../img/login-bg.png">
				</div>
		
				<div class="form">
		
					<div class="center" style="text-align: center;">
						<h2 class="mb-3">Đăng ký tài khoản</h2>
						<p class="mb-4">Chú ý các nội dung có dấu * bạn cần phải nhập</p>
		
					</div>
		
					<div class="hh-form" id="registerForm">
						<form method="post">
							<div class="form-controls">
								<label>Tài khoản:</label>
								<div class="controls">
									<input name="UserName" id="UserName" type="text" placeholder="Tài khoản *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Họ tên:</label>
								<div class="controls">
									<input name="FullName" id="FullName" type="text" placeholder="Họ tên *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Mật khẩu:</label>
								<div class="controls">
									<input name="PasswordHash" id="PasswordHash" type="text" placeholder="Mật khẩu *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Nhập lại mật khẩu:</label>
								<div class="controls">
									<input name="SecurityStamp" id="SecurityStamp" type="text" placeholder="Nhập lại mật khẩu *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Email:</label>
								<div class="controls">
									<input name="Email" id="Email" type="text" placeholder="Email *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls d-none">
								<label>Giới tính:</label>
								<div class="controls">
									<label class="radio-ctn">
										<input name="Sex" type="radio" value="Nam">
										<span class="checkmark"></span>
										<span><strong>Nam</strong></span>
									</label>
		
									<label class="radio-ctn">
										<input name="Sex" type="radio" value="Nữ">
										<span class="checkmark"></span>
										<span><strong>Nữ</strong></span>
									</label>
								</div>
							</div>
		
							<div class="form-controls d-none">
								<label>Ngày tháng năm sinh:</label>
								<div class="controls">
									<input name="UserBirthDate" id="UserBirthDate" type="text" placeholder="Ngày tháng năm sinh" value="">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Điện thoại:</label>
								<div class="controls">
									<input name="PhoneNumber" id="PhoneNumber" type="tel" placeholder="Điện thoại *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls">
								<label>Địa chỉ:</label>
								<div class="controls">
									<input name="Address" id="Address" type="text" placeholder="Địa chỉ *" data-required="1">
								</div>
							</div>
		
							<div class="form-controls d-none">
								<label>Tỉnh/Thành phố:</label>
								<div class="controls">
									<select name="SystemCityID" id="SystemCityID" placeholder="Tỉnh/Thành phố">
										<option value="">Chọn tỉnh/thành phố</option>
											<option value="1">Hà Nội</option>
											<option value="50">TP HCM</option>
											<option value="57">An Giang</option>
											<option value="49">Bà Rịa</option>
											<option value="15">Bắc Giang</option>
											<option value="4">Bắc Kạn</option>
											<option value="62">Bạc Liêu</option>
											<option value="18">Bắc Ninh</option>
											<option value="53">Bến Tre</option>
											<option value="35">Bình Định</option>
											<option value="47">Bình Dương</option>
											<option value="45">Bình Phước</option>
											<option value="39">Bình Thuận</option>
											<option value="63">Cà Mau</option>
											<option value="59">Cần Thơ</option>
											<option value="3">Cao Bằng</option>
											<option value="32">Đà Nẵng</option>
											<option value="42">Đắk Lắk</option>
											<option value="43">Đắk Nông</option>
											<option value="7">Điện Biên</option>
											<option value="48">Đồng Nai</option>
											<option value="56">Đồng Tháp</option>
											<option value="41">Gia Lai</option>
											<option value="2">Hà Giang</option>
											<option value="23">Hà Nam</option>
											<option value="28">Hà Tĩnh</option>
											<option value="19">Hải Dương</option>
											<option value="20">Hải Phòng</option>
											<option value="60">Hậu Giang</option>
											<option value="11">Hoà Bình</option>
											<option value="21">Hưng Yên</option>
											<option value="37">Khánh Hòa</option>
											<option value="58">Kiên Giang</option>
											<option value="40">Kon Tum</option>
											<option value="8">Lai Châu</option>
											<option value="44">Lâm Đồng</option>
											<option value="13">Lạng Sơn</option>
											<option value="6">Lào Cai</option>
											<option value="51">Long An</option>
											<option value="24">Nam Định</option>
											<option value="27">Nghệ An</option>
											<option value="25">Ninh Bình</option>
											<option value="38">Ninh Thuận</option>
											<option value="16">Phú Thọ</option>
											<option value="36">Phú Yên</option>
											<option value="29">Quảng Bình</option>
											<option value="33">Quảng Nam</option>
											<option value="34">Quảng Ngãi</option>
											<option value="14">Quảng Ninh</option>
											<option value="30">Quảng Trị</option>
											<option value="61">Sóc Trăng</option>
											<option value="9">Sơn La</option>
											<option value="46">Tây Ninh</option>
											<option value="22">Thái Bình</option>
											<option value="12">Thái Nguyên</option>
											<option value="26">Thanh Hóa</option>
											<option value="31">Thừa Thiên Huế</option>
											<option value="52">Tiền Giang</option>
											<option value="54">Trà Vinh</option>
											<option value="5">Tuyên Quang</option>
											<option value="55">Vĩnh Long</option>
											<option value="17">Vĩnh Phúc</option>
											<option value="10">Yên Bái</option>
									</select>
								</div>
							</div>
		
							<div class="form-controls d-none">
								<label>Quận/Huyện:</label>
								<div class="controls">
									<select name="SystemDistrictID" id="SystemDistrictID" data-required="1" placeholder="Quận/Huyện *">
										<option value="">Chọn quận/Huyện *</option>
									</select>
								</div>
							</div>
		
							<?php 
								if (!empty($message)) {
									echo "<p class='alert alert-info'>" . $message . "</p>";
									$message=null;
								}
							 ?>
		
							<div class="form-controls mt-4">
								<div class="controls submit-controls">
									<button type="submit" name="submit">ĐĂNG KÝ TÀI KHOẢN</button>
								</div>
							</div>
		
						</form>
						
					</div>
				</div>
			</div>
			<ion-icon src="/front-end/asset/image/close-circle-outline.svg"></ion-icon>
		</div>

		<!-- Footer -->
		<?php include 'common/footer.php'?>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	</body>
</html>
