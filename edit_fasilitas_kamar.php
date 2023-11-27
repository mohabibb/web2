<fieldset>
    <legend>Edit Data Fasilitas Kamar</legend>

	<?php
	$id_fasilitas_kamar = @$_GET['id_fasilitas_kamar'];
	$sql = mysqli_query($koneksi,"select * from tb_fasilitas_kamar where id_fasilitas_kamar ='$id_fasilitas_kamar'") or die (mysqli_error());
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
				    <td>Nama fasilitas kamar</td>
				    <td>:</td>
			        <td><input type="text" name="nama_fasilitas_kamar" value="<?php echo $data['nama_fasilitas_kamar']; ?>" /></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
			        <td><input type="submit" name="edit" Value="Edit" /> <input type="reset" value="Batal" /></td>
			    </tr>
	        </table>
	    </form>
		
		<?php
		$id_kamar = @$_POST['id_kamar'];
		$nama_fasilitas_kamar = @$_POST['nama_fasilitas_kamar'];

		$edit_fasilitas_kamar = @$_POST['edit'];
		
		if($edit_fasilitas_kamar){
			if($id_kamar == "" || $nama_fasilitas_kamar == ""){
				?>
				    <script type="text/javascript">
				    alert("Inputan tidak boleh ada yang kosong");
					</script>
				<?php
			} else{
				mysqli_query($koneksi, "update tb_fasilitas_kamar set id_kamar = '$id_kamar', nama_fasilitas_kamar = '$nama_fasilitas_kamar' where id_fasilitas_kamar = '$id_fasilitas_kamar'") or die (mysqli_error());
				    ?>
				    <script type="text/javascript">
				    alert("Data berhasil diedit");
					window.location.href="?halaman=fasilitas_kamar";
					</script>
				<?php
			    }
			}
		?>
</fieldset>