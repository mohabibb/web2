<fieldset>
	<legend><b>Tambah Data Fasilitas Kamar</b></legend>

	 <form action="" method="post">
	        <table>
			    <tr>
				    <td>Id fasilitas kamar</td>
				    <td>:</td>
			        <td><input type="text" name="id_fasilitas_kamar" required /></td>
			    </tr>
				<tr>
				    <td>Id kamar</td>
				    <td>:</td>
			        <td><input type="text" name="id_kamar" required /></td>
			    </tr>
				<tr>
				    <td>Nama fasilitas kamar</td>
				    <td>:</td>
			        <td><input type="text" name="nama_fasilitas_kamar"  required></texttarea></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
				    <td><input type="submit" name="tambah" value="Tambah" /> <input type="reset" value="Batal" /></td>
				</tr>
			</table>
		</form>

		<?php
		$id_fasilitas_kamar = @$_POST['id_fasilitas_kamar'];
		$id_kamar = @$_POST['id_kamar'];
		$nama_fasilitas_kamar = @$_POST['nama_fasilitas_kamar'];

		if(@$_POST['tambah']) {
			if(!is_numeric($id_fasilitas_kamar)) {
				echo '<script type="text/javascript">alert("NO.Identitas harus berupa angka!");</script>';
			} else {
				mysqli_query($koneksi,"INSERT INTO tb_fasilitas_kamar(id_fasilitas_kamar,id_kamar,nama_fasilitas_kamar) VALUES('$id_fasilitas_kamar', '$id_kamar', '$nama_fasilitas_kamar')") or die(mysqli_error());
                echo '<script type="text/javascript">alert("Tambah data fasilitas_kamar baru berhasil");window.location.href="?halaman=fasilitas_kamar";</script';
			}
		} ?>
		
</fieldset>