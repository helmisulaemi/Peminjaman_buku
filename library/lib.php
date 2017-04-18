<?php
	/**
	* 
	*/
	class oop
	{
		
		function simpan($table,array $data,$redirect)
		{
			$sql = "INSERT INTO $table set";
			foreach ($data as $key => $value) {
				$sql .=" $key = '$value',";
			}
			$sql = rtrim($sql,',');
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data tersimpan !');document.location.href='$redirect'</script>";
			}else{
				echo mysql_error();
			}
		}

		function update($table,array $data, $where, $redirect)
		{
			$sql = "UPDATE $table set";
			foreach ($data as $key => $value) {
				$sql .=" $key = '$value',";
			}
			$sql = rtrim($sql,',');
			$sql .=" Where $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data terupdate !');document.location.href='$redirect'</script>";
			}else{
				echo mysql_error();
			}
		}

		function edit($table,$where)
		{
			$sql = "Select * from $table where $where";
			$edit = mysql_fetch_array(mysql_query($sql));
			return $edit;
		}

		function hapus($table,$where,$redirect)
		{
			$sql = "DELETE from $table where $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data terhapus !');document.location.href='$redirect'</script>";
			}else{
				echo mysql_error();
			}
		}

		function tampil($table)
		{
			$sql = "select * from $table";
			$query = mysql_query($sql);
			while ($data = mysql_fetch_array($query)) 
				$isi[] = $data;
			return $isi;
			
		}

		function login($table, $username, $password,$nama_form)
		{
			@session_start();
			$sql = "Select * from $table where username = '$username' and password = '$password'";
			$jalan = mysql_query($sql);
			$cek = mysql_num_rows($jalan);
			if($cek > 0){
				$_SESSION['username'] = $username;
				echo "<script>alert('Login Berhasil');document.location.href='$nama_form'</script>";
			}else{
				echo "<script>alert('Maaf Username atau Password Anda salah !');document.location.href='index.php'</script>";
			}
		}

		function upload($foto,$tempat)
		{
			$alamat = $foto['tpm_name'];
			$nama_file = $foto['name'];
			move_uploaded_file($alamat,"$tempat/$nama_file");
			return $nama_file;
		}

	}
?>