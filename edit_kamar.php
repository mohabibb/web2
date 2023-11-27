<fieldset>
    <legend>Lihat Data Kamar</legend>

	<?php
	$id_kamar = @$_GET['id_kamar'];
	$sql = mysqli_query($koneksi,"select * from tb_kamar where id_kamar ='$id_kamar'") or die (mysqli_error());
	$data = mysqli_fetch_array($sql);
	?>
	<form action="" method="post" enctype="multipart/form-data">
	        <table>
			    <tr>
				    <td>Id kamar</td>
				    <td>:</td>
			        <td><input type="text" name="id_kamar" value="<?php echo $data['id_kamar']; ?>" /></td>
			    </tr>
				<tr>
				    <td>Tipe kamar</td>
				    <td>:</td>
			        <td><input type="text" name="tipe_kamar" value="<?php echo $data['tipe_kamar']; ?>" /></td>
			    </tr>
				<tr>
				    <td>Jumlah kamar</td>
				    <td>:</td>
			        <td><input type="text" name="jumlah_kamar" value="<?php echo $data['jumlah_kamar']; ?>" /></td>
			    </tr>
				<tr>
				    <td>Foto kamar</td>
				    <td>:</td>
			        <td><input type="file" name="foto_kamar" /></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
			        <td><input type="submit" name="edit" Value="Edit" /> <input type="reset" value="Batal" /></td>
			    </tr>
	        </table>
	    </form>
		
		<?php
		$tipe_kamar = @$_POST['tipe_kamar'];
		$jumlah_kamar = @$_POST['jumlah_kamar'];
		
		$sumber = @$_FILES['foto_kamar']['tmp_name'];
		$target = '../img/';
		$foto_kamar = @$_FILES['foto_kamar']['name'];

		$edit_kamar = @$_POST['edit'];
		
		if($edit_kamar){
			if($tipe_kamar == "" || $jumlah_kamar == ""){
				?>
				    <script type="text/javascript">
				    alert("Inputan tidak boleh ada yang kosong");
					</script>
				<?php
			} else{
				if($foto_kamar == ""){
				mysqli_query($koneksi, "update tb_kamar set tipe_kamar = '$tipe_kamar', jumlah_kamar = '$jumlah_kamar' where id_kamar = '$id_kamar'") or die (mysqli_error());	
                    ?>
				    <script type="text/javascript">
				    alert("Data berhasil diedit");
					window.location.href="?halaman=kamar";
					</script>
				    <?php
				} else{
				$pindah = move_uploaded_file($sumber, $target.$foto_kamar);
				if($pindah){
				mysqli_query($koneksi, "update tb_kamar set tipe_kamar = '$tipe_kamar', jumlah_kamar = '$jumlah_kamar',foto_kamar = '$foto_kamar' where id_kamar = '$id_kamar'") or die (mysqli_error());
				    ?>
				    <script type="text/javascript">
				    alert("Data berhasil diedit");
					window.location.href="?halaman=kamar";
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