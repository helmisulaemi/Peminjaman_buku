<?php
	date_default_timezone_set('Asia/Jakarta');

	@session_start();

	include("../config/koneksi.php");
	include("../library/lib.php");
	$perintah = new oop();

	if(empty($_SESSION['username'])){
		echo "<script>document.location.href='../'</script>";
	}else{
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Perpustakaan</title>
	<link rel="stylesheet" href="../asset/css/style.css">
	<link rel="stylesheet" href="../asset/css/fontello.css">
</head>
<?php
	

	$menu = array(
				array('url'=>'utama','img'=>'icon-gauge','text'=>'Dashboard','con'=>""),
				array('url'=>'buku','img'=>'icon-book','text'=>'Buku','con'=>""),
				array('url'=>'peminjaman','img'=>'icon-th-list','text'=>'Penminjaman','con'=>""),
				array('url'=>'pengembalian','img'=>'icon-folder-open','text'=>'Pengembalian','con'=>""),
				array('url'=>'logout','img'=>'icon-off','text'=>'Logout','con'=>"return confirm('Klik Ok unutk Keluar !')")
		);
?>
<body>
	<nav>
		<ul class="dropdown">
		    <li><a href="" class="brand">Aplikasi Perpustakaan</a></li>
		    <ul class="dropdown right">
		    	<li><a href="">Hallo, <?php echo $_SESSION['username']?></a></li>
			</ul>
		</ul>
	</nav>
    <br></br>
	<div class="kotak-atas">
		<?php
			foreach ($menu as $a) {
				if($_GET['menu'] == $a['url']){
			
		?> 
			<a href="index.php?menu=<?php echo $a['url']?>" onclick="<?php echo $a['con']?>" class="kotak-menu-aktif"><center><i class="<?php echo $a['img']?>" style="font-size:70px;"></i><br> <?php echo $a['text']?></center></a>
		<?php }else{ ?>
			<a href="index.php?menu=<?php echo $a['url']?>" onclick="<?php echo $a['con']?>" class="kotak-menu"><center><i class="<?php echo $a['img']?>" style="font-size:70px;"></i><br> <?php echo $a['text']?></center></a>
		<?php
			} }
		?>
	</div>
	<br>
	<?php

		switch ($_GET['menu']) {
			case 'utama':
				include('main.php');
				break;
			
			case 'buku':
				include('buku.php');
				break;

			case 'peminjaman':
				include('pinjam.php');
				break;

			case 'pengembalian':
				include('pengembalian.php');
				break;

			case 'logout':
				include('logout.php');
				break;
		}

	?>
</body>
</html>
<?php } ?>