<fieldset>
    <legend>Tambah Data Kamar</legend>

    <?php
    ob_start();
    $carikode = mysqli_query($koneksi,"select max(id_kamar) from tb_kamar") or die (mysqli_error());
    $datakode = mysqli_fetch_array($carikode);
    if($datakode){
    	$nilaikode = substr($datakode[0], 1);
    	$kode = (int) $nilaikode;
    	$kode = $kode + 1;
    	$hasilkode = "2".str_pad($kode, 3,"0",STR_PAD_LEFT);
    } else {
    	$hasilkode = "2001";
    }
    ?>
	
	    <form action="" method="post" enctype="multipart/form-data">
	        <table>
			    <tr>
				    <td>Id kamar</td>
				    <td>:</td>
			        <td><input type="text" name="id_kamar" value="<?php echo $hasilkode; ?>" /></td>
			    </tr>
				<tr>
				    <td>Tipe kamar</td>
				    <td>:</td>
			        <td><input type="text" name="tipe_kamar" /></td>
			    </tr>
				<tr>
				    <td>Jumlah kamar</td>
				    <td>:</td>
			        <td><input type="text" name="jumlah_kamar" /></td>
			    </tr>
			    <tr>
				    <td>Foto kamar</td>
				    <td>:</td>
			        <td><input type="file" name="foto_kamar" /></td>
			    </tr>
				<tr>
				    <td></td>
				    <td></td>
			        <td><input type="submit" name="tambah" Value="Tambah" /> <input type="reset" value="batal" /></td>
			    </tr>
	        </table>
	    </form>
		
		<?php
		
		$id_kamar = @$_POST['id_kamar'];
		$tipe_kamar = @$_POST['tipe_kamar'];
		$jumlah_kamar= @$_POST['jumlah_kamar'];
		
		$sumber = @$_FILES['foto_kamar']['tmp_name'];
		$target = '../img/';
		$foto_gambar = @$_FILES['foto_kamar']['name'];
        $tambah_kamar = @$_POST['tambah'];

if(@$_POST['tambah']) {
        if($tambah_kamar){
      
           if($id_kamar == "" || $tipe_kamar == "" || $jumlah_kamar == "" || $foto_gambar == "" ) {
        }
		$pindah = move_uploaded_file($sumber, $target.$foto_gambar);
				if($pindah) {
				mysqli_query($koneksi, "insert into tb_kamar values('$id_kamar','$tipe_kamar','$jumlah_kamar','$foto_gambar')") or die (mysqli_error());
				?>
				    <script type="text/javascript">
				    alert("Tambah data kamar baru berhasil");
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
		?>
</fieldset>