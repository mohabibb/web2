<fieldset>
	<legend><b>Edit Admin</b></legend>

<?php

$kode_user = @$_GET['kode_user'];
$sql_profil = mysqli_query($koneksi,"SELECT * FROM tb_login WHERE kode_user = '$kode_user'") or die(mysqli_error());
$data = mysqli_fetch_array($sql_profil);
?>
<form action="" method="post">
	        <table>
	        	<tr>
				    <td>Kode user</td>
				    <td>:</td>
			        <td><input type="text" name="kode_user" value="<?php echo $data['kode_user']; ?>" required /></td>
			    </tr>
			    <tr>
				    <td>Username</td>
				    <td>:</td>
			        <td><input type="text" name="username" value="<?php echo $data['username']; ?>" required /></td>
			    </tr>
				<tr>
					<td>password</td>
				    <td>:</td>
			        <td><input type="text" name="password" required /></td>
			    </tr>
			    <tr>
			    	<td>Nama Admin</td>
				    <td>:</td>
			        <td><input type="text" name="nama_admin"  value="<?php echo $data['nama_admin']; ?>" required /></td>
			    </tr>
				<tr>
				    <td>Alamat Admin</td>
				    <td>:</td>
			        <td><input type="text" name="alamat" value="<?php echo $data['alamat_admin']; ?>"required /></td>
				</tr>
				<tr>
					<td>No tlp Admin</td>
					<td>:</td>
					<td><input type="text" name="no_tlp_admin" value="<?php echo $data['no_tlp_admin']; ?>" required /></td>
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
				    <td><input type="submit" name="edit" value="Edit" /> <input type="reset" value="Batal" /></td>
			</tr>	
	 </table>
	</form>
    <?php
    if(@$_POST['edit']) {
    	$pass = $_POST['password'];
    	$nama = $_POST['nama_admin'];
    	$alamat = $_POST['alamat'];
    	$user = $_POST['username'];
    	$no_tlp_admin = $_POST['no_tlp_admin'];
    	$level = $_POST['level'];
        mysqli_query($koneksi,"UPDATE tb_login SET 
        	username = '$user', 
        	nama_admin = '$nama', 
        	level = '$level', 
        	alamat_admin = '$alamat', 
        	no_tlp_admin = '$no_tlp_admin', 
        	password = md5('$pass') 
        	WHERE kode_user='$kode_user'") or die (mysqli_error());
        header("location: ?halaman=admin");
    }
    ?>
</fieldset>