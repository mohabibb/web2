<fieldset>
	<legend><b>Tambah Data Fasilitas Hotel</b></legend>

	 <form action="" method="post" enctype="multipart/form-data">
	        <table>
			    <tr>
				    <td>Id fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="text" name="id_fasilitas_hotel" required /></td>
			    </tr>
				<tr>
				    <td>Nama fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="text" name="nama_fasilitas_hotel" required /></td>
			    </tr>
				<tr>
				    <td>Foto fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="file" name="foto_fasilitas_hotel"  required /></td>
			    </tr>
			    <tr>
				    <td>Deskripsi fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="text" name="deskripsi_fasilitas_hotel"  required /></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
				    <td><input type="submit" name="tambah" value="Tambah" /> <input type="reset" value="Batal" /></td>
				</tr>
			</table>
		</form>

		<?php
		if(@$_POST['tambah']){
		$id_fasilitas_hotel = @$_POST['id_fasilitas_hotel'];
		$nama_fasilitas_hotel = @$_POST['nama_fasilitas_hotel'];

		$sumber = @$_FILES['foto_fasilitas_hotel']['tmp_name'];
		$target = '../img/';
		$foto_fasilitas_hotel = @$_FILES['foto_fasilitas_hotel']['name'];

		$deskripsi_fasilitas_hotel = @$_POST['deskripsi_fasilitas_hotel'];

		$tambah_fasilitas_hotel = @$_POST['tambah'];

		$pindah = move_uploaded_file($sumber, $target.$foto_fasilitas_hotel);
				if($pindah) {
				mysqli_query($koneksi, "insert into tb_fasilitas_hotel values('$id_fasilitas_hotel','$nama_fasilitas_hotel','$foto_fasilitas_hotel','$deskripsi_fasilitas_hotel')") or die (mysqli_error());
				?>
				    <script type="text/javascript">
				    alert("Tambah data hotel baru berhasil");
					window.location.href="?halaman=fasilitas_hotel";
					</script>
				<?php
			  } else {
			  	?>
			  	<script type="text/javascript">
			  	alert("Gambar gagal diupload");
			  	</script>
			  	<?php
			  }
			}
		?>
</fieldset>