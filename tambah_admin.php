<fieldset>
    <legend>Tambah Data Kamar</legend>

    <?php
    ob_start();
    $carikode = mysqli_query($koneksi,"select max(kode_user) from tb_login") or die (mysqli_error());
    $datakode = mysqli_fetch_array($carikode);
    if($datakode){
    	$nilaikode = substr($datakode[0], 1);
    	$kode = (int) $nilaikode;
    	$kode = $kode + 1;
    	$hasilkode = "1".str_pad($kode, 3,"0",STR_PAD_LEFT);
    } else {
    	$hasilkode = "1001";
    }
    ?>
	
	    <form action="" method="post" enctype="multipart/form-data">
	        <table>
			    <tr>
				    <td>Kode User</td>
				    <td>:</td>
			        <td><input type="text" name="kode_user" value="<?php echo $hasilkode; ?>" /></td>
			    </tr>
				<tr>
				    <td>Username</td>
				    <td>:</td>
			        <td><input type="text" name="username" /></td>
			    </tr>
				<tr>
				    <td>Password</td>
				    <td>:</td>
			        <td><input type="text" name="password" /></td>
			    </tr>
				<tr>
				    <td>Nama admin</td>
				    <td>:</td>
			        <td><input type="text" name="nama_admin" /></td>
			    </tr>
				<tr>
				    <td>Alamat admin</td>
				    <td>:</td>
			        <td><input type="text" name="alamat_admin" /></td>
			    </tr>
				<tr>
					<td>No tlp admin</td>
					<td>:</td>
					<td><input type="text" name="no_tlp_admin" /></td>
				</tr>
				<tr>
					<td>level</td>
					<td>:</td>
					<td><select name="level">
		  		<option value="">- Pilih level -</option>
		  		<option value="administrator">administrator</option>
		  		<option value="resepsionis">resepsionis</option>
		  	</select></td>
				</tr>
				<tr>
				    <td></td>
				    <td></td>
			        <td><input type="submit" name="tambah" Value="Tambah" /> <input type="reset" value="batal" /></td>
			    </tr>
	        </table>
	    </form>
		
		<?php
		$kode_user = @$_POST['kode_user'];
		$username = @$_POST['username'];
		$password = @$_POST['password'];
		$nama_admin = @$_POST['nama_admin'];
		$alamat_admin = @$_POST['alamat_admin'];
        $no_tlp_admin = @$_POST['no_tlp_admin'];
        $level = @$_POST['level'];

		$tambah_admin = @$_POST['tambah'];

		if(@$_POST['tambah']) {
			if(!is_numeric($kode_user)) {
				echo '<script type="text/javascript">alert("kode user harus berupa angka!");</script>';
			} else {
				mysqli_query($koneksi,"INSERT INTO tb_login(kode_user,username,password,nama_admin,alamat_admin,no_tlp_admin,level) VALUES('$kode_user', '$username', '$password', '$nama_admin','$alamat_admin','$no_tlp_admin','$level')") or die(mysqli_error());
               ?>
				    <script type="text/javascript">
				    alert("Tambah data admin baru berhasil");
					window.location.href="?halaman=admin";
					</script>
				<?php
			}
		}
		?>
</fieldset>