<fieldset>
    <legend>Edit Data Fasilitas Hotel</legend>

	<?php
	$id_fasilitas_hotel = @$_GET['id_fasilitas_hotel'];
	$sql = mysqli_query($koneksi,"select * from tb_fasilitas_hotel where id_fasilitas_hotel ='$id_fasilitas_hotel'") or die (mysqli_error());
	$data = mysqli_fetch_array($sql);
	?>
	<form action="" method="post" enctype="multipart/form-data">
	        <table>
				<tr>
				    <td>Nama fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="text" name="nama_fasilitas_hotel" value="<?php echo $data['nama_fasilitas_hotel']; ?>" /></td>
			    </tr>
			    <tr>
				    <td>Foto fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="file" name="foto_fasilitas_hotel" value="<?php echo $data['foto_fasilitas_hotel']; ?>" /></td>
			    </tr>
			    <tr>
				    <td>Deskripsi fasilitas hotel</td>
				    <td>:</td>
			        <td><input type="text" name="deskripsi_fasilitas_hotel" value="<?php echo $data['deskripsi_fasilitas_hotel']; ?>" /></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
			        <td><input type="submit" name="edit" Value="Edit" /> <input type="reset" value="Batal" /></td>
			    </tr>
	        </table>
	    </form>
		
		<?php
		$nama_fasilitas_hotel = @$_POST['nama_fasilitas_hotel'];

		$sumber = @$_FILES['foto_fasilitas_hotel']['tmp_name'];
		$target = '../img/';
		$nama_gambar = @$_FILES['foto_fasilitas_hotel']['name'];
		
		$deskripsi_fasilitas_hotel = @$_POST['deskripsi_fasilitas_hotel'];

		$edit_fasilitas_hotel = @$_POST['edit'];
		
		if($edit_fasilitas_hotel){
			if($nama_fasilitas_hotel == "" || $deskripsi_fasilitas_hotel == ""){
				?>
				    <script type="text/javascript">
				    alert("Inputan tidak boleh ada yang kosong");
					</script>
				<?php
			} else{
				if($nama_gambar == ""){
				mysqli_query($koneksi, "update tb_fasilitas_hotel set nama_fasilitas_hotel = '$nama_fasilitas_hotel',deskripsi_fasilitas_hotel = '$deskripsi_fasilitas_hotel' where id_fasilitas_hotel = '$id_fasilitas_hotel'") or die (mysqli_error());	
                    ?>
				    <script type="text/javascript">
				    alert("Data berhasil diedit");
					window.location.href="?halaman=fasilitas_hotel";
					</script>
				    <?php
				} else{
				$pindah = move_uploaded_file($sumber, $target.$nama_gambar);
				if($pindah){
				mysqli_query($koneksi, "update tb_fasilitas_hotel set nama_fasilitas_hotel = '$nama_fasilitas_hotel',foto_fasilitas_hotel = '$nama_gambar' where id_fasilitas_hotel = '$id_fasilitas_hotel'") or die (mysqli_error());
				    ?>
				    <script type="text/javascript">
				    alert("Data berhasil diedit");
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
			}
		}
		?>
</fieldset>