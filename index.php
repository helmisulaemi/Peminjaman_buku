<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<?php
	@session_start();
	include("config/koneksi.php");
	include("library/lib.php");
	$perintah = new oop();

	$username = $_POST['username'];
	$password = md5(trim($_POST['password']));
	$nama_form = "page/index.php?menu=utama";
	if(isset($_POST['masuk'])){
		$perintah->login("user",$username,$password,$nama_form);
	}
?>
<body >
	<br><br></br>
	<div class="wrap">
			<form method="post">
			<table width="100%" align="center">
				<tr>
					<td><h2 class="judul"><center>Silahkan Login</center></h2></td>
				</tr>
				<tr>
					<td><hr style="border:thin solid #81CFE0"></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td><input type="text" name="username" class="form" required placeholder="Username"></td>
				</tr>
				<tr>
					<td><input type="password" name="password" class="form" required placeholder="Password"></td>
				</tr>
				<tr>
					<td><input type="submit" name="masuk" class="btn" value="MASUK"></td>
				</tr>
			</table>

			</form>
		</div>
	</div>
	<br>
	<center>&copy; 2016 <a href="index.php" style="color:#81CFE0;text-decoration:none;">Aplikasi Perpustakaan</a></center>
</body>
</html>