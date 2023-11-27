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
			        <td><?php echo $data['id_kamar']; ?></td>
			    </tr>
				<tr>
				    <td>Tipe kamar</td>
				    <td>:</td>
			        <td><?php echo $data['tipe_kamar']; ?></td>
			    </tr>
				<tr>
				    <td>Jumlah kamar</td>
				    <td>:</td>
			        <td><?php echo $data['jumlah_kamar']; ?></td>
			    </tr>
				<tr>
				    <td>Foto kamar</td>
				    <td>:</td>
			        <td align="center"><img src="../img/<?php echo $data['foto_kamar']; ?>" width="120px" /></td>
			    </tr>
		</table>
</form>
</fieldset>