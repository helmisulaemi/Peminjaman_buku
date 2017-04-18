<?php
	@$carikode = mysql_fetch_array(mysql_query("select * from buku order by kd_buku DESC"));
	@$kode = substr($carikode['kd_buku'],2,3)+1;
	@$nextkode = sprintf("BK"."%03s",$kode);

	@$table = "buku";
	@$redirect = "?menu=buku";
	@$where = "kd_buku = '$_GET[id]'";
	if(isset($_POST['simpan'])){
		$data = array(
					'kd_buku'=>$_POST['id'],
					'nama_buku'=>$_POST['nama'],
					'penerbit'=>$_POST['pener'],
					'pengarang'=>$_POST['penga'],
					'kd_kategori'=>$_POST['kate']
			);
		$perintah->simpan($table,$data,$redirect);
	}
	if(isset($_GET['edit'])){
		$edit = $perintah->edit("qbuku",$where);
	}
	if(isset($_GET['hapus'])){
		$perintah->hapus($table,$where,$redirect);
	}
	if(isset($_POST['update'])){
		$data = array(
					'nama_buku'=>$_POST['nama'],
					'penerbit'=>$_POST['pener'],
					'pengarang'=>$_POST['penga'],
					'kd_kategori'=>$_POST['kate']
			);
		$perintah->update($table,$data,$where,$redirect);
	}
?>
<div class="kotak-bawah">
	<h4>Form Buku</h4>
	<form method="post" enctype="">
	<table class="table" width="100%">
		<tr>
			<td>Id Buku</td>
			<td>:</td>
			<td><input type="text" name="id" class="form" value="<?php if(@$_GET[id]==''){echo $nextkode;}else{echo @$edit[0];} ?>" required readonly></td>
		</tr>
		<tr>
			<td>Nama Buku</td>
			<td>:</td>
			<td><input type="text" name="nama" class="form" value="<?php echo @$edit[1] ?>" required></td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td>:</td>
			<td><input type="text" name="pener" class="form" value="<?php echo @$edit[2]?>" required></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td>:</td>
			<td><input type="text" name="penga" class="form" value="<?php echo @$edit[3] ?>" required></td>
		</tr>
		<tr>
			<td>Kategori</td>
			<td>:</td>
			<td>
				<select name="kate" class="form-select" required>
					<option value="<?php echo $edit[4] ?>"><?php echo @$edit[5] ?></option>
					<?php
						$a = $perintah->tampil("kategori");
						foreach ($a as $b) {
					?>
					<option value="<?php echo $b[0]?>"><?php echo $b[1]?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<?php if(@$_GET['id']==''){ ?>
				<input type="submit" name="simpan" value="SIMPAN" class="btnn">
				<input type="reset" value="RESET" class="btnn">
				<?php }else{ ?>
				<input type="submit" name="update" value="UPDATE" class="btnn">
				<a href="?menu=buku" class="btnn a" style="color:white" onclick="return confirm('Batalkan Perubahan ?')">BATAL</a>
				<?php } ?>
			</td>
		</tr>
	</table>
	</form>
	<hr style="border:thin solid #50aacb">
	<table align="center" width="100%" border="1" class="table">
		<tr style="background:#50aacb;color:white;font-weight:bold;">
			<td>No</td>
			<td>ID Buku</td>
			<td>Nama Buku</td>
			<td>Jenis Buku</td>
			<td>Penerbit</td>
			<td>Pengarang</td>
			<td></td>
		</tr>
		<?php
		$no = 0;
		$a = $perintah->tampil("qbuku Order By kd_buku DESC");
		if($a == ""){
			echo "<tr><td colspan='7' align='center'><<strong>No Record</strong></td><tr>";
		}else{
			foreach ($a as $data) {
				$no++
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $data['kd_buku'] ?></td>
			<td><?php echo $data['nama_buku'] ?></td>
			<td><?php echo $data['kategori']?></td>
			<td><?php echo $data['penerbit'] ?></td>
			<td><?php echo $data['pengarang'] ?></td>
			<td>
				<a href="?menu=buku&edit&id=<?php echo $data[0]?>">Edit</a> |
				<a href="?menu=buku&hapus&id=<?php echo $data[0]?>" onclick="return confirm('Hapus <?php echo $data[1]?> ?')">Hapus</a>
			</td>
		</tr>
		<?php } } ?>
	</table>
</div>