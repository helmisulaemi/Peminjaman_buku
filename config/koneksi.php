<?php

	$user = "root";
	$pass = "";
	$host = "localhost";
	$database = "perpustakaan";

	mysql_connect($host,$user,$pass) or die("Koneksi Gagal !");
	mysql_select_db($database) or die("Database tidak ditemukan !");

?>