<fieldset>
	<legend>Tampil Data Fasilitas Hotel</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post"> 
			<input type="text" name="inputan_pencarian" placeholder="Masukkan nama_fasilitas_hotel" style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_fasilitas_hotel" value="Cari" style="padding: 3px;" />
		</form>
	</div>

	<table width="100%" border="1px" style="border:1px solid #000; border-collapse:collapse;">
		<tr style="background-color:#fc0;"> 
			<th>Id fasilitas hotel</th>
			<th>Nama fasilitas hotel</th>
			<th>Foto fasilitas hotel</th>
			<th>Deskripsi fasilitas hotel</th>
			<th>Opsi</th>
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_fasilitas_hotel = @$_POST['cari_fasilitas_hotel'];
		if($cari_fasilitas_hotel) {
			if($inputan_pencarian |= "") {
				$sql = mysqli_query($koneksi,"select * from tb_fasilitas_hotel where nama_fasilitas_hotel like '%$inputan_pencarian%'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($koneksi,"select * from tb_fasilitas_hotel") or die (mysqli_error());
			}
		} else {
			$sql = mysqli_query($koneksi,"select * from tb_fasilitas_hotel") or die (mysqli_error());
		}

		$cek = mysqli_num_rows($sql);
		if($cek < 1) {
			?>
			<tr>
				<td colspan="7" align="center" style="padding: 10px;">Data tidak ditemukan ></td>
			</tr>
			<?php
		} else {

			while($data = mysqli_fetch_array($sql)) {
			?>
				<tr>
					<td align="center"><?php echo $data['id_fasilitas_hotel']; ?></td>
					<td align="center"><?php echo $data['nama_fasilitas_hotel']; ?></td>
					<td align="center"><img src="../img/<?php echo $data['foto_fasilitas_hotel']; ?>" width="120px" /></td>
					<td align="center"><?php echo $data['deskripsi_fasilitas_hotel']; ?></td>
					<td align="center">
						<a href="?halaman=fasilitas_hotel&action=edit&id_fasilitas_hotel=<?php echo $data['id_fasilitas_hotel'] ?>"><button>Edit</button></a>
						<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=fasilitas_hotel&action=hapus&id_fasilitas_hotel=<?php echo $data['id_fasilitas_hotel'] ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}

		}
		?>
	</table>
	<div style="padding-top: 10px;float:right;">
		<a href="?halaman=fasilitas_hotel&action=tambah" target=""><button>Tambah</button></a>
	</div>
</fieldset>