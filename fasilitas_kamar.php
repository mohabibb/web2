<fieldset>
	<legend>Tampil Data Fasilitas Kamar</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post"> 
			<input type="text" name="inputan_pencarian" placeholder="Masukkan nama fasilitas kamar" style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_fasilitas_kamar" value="Cari" style="padding: 3px;" />
		</form>
	</div>

	<table width="100%" border="1px" style="border:1px solid #000; border-collapse:collapse;">
		<tr style="background-color:#fc0;"> 
			<th>Tipe kamar</th>
			<th>Nama fasilitas kamar</th>
			<th>opsi</th>			
		</tr>
		<?php
		$no = 1;

		$batas = 5;
		$hal = @$_GET['hal'];
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
		} else {
			$posisi = ($hal - 1) * $batas;
		}

		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_fasilitas_kamar = @$_POST['cari_fasilitas_kamar'];
		if($cari_fasilitas_kamar) {
			if($inputan_pencarian |= "") {
				$sql = mysqli_query($koneksi,"select tb_kamar.*, tb_fasilitas_kamar.* from tb_fasilitas_kamar LEFT JOIN tb_kamar on tb_kamar.id_kamar = tb_fasilitas_kamar.id_kamar where nama_fasilitas_kamar like '%$inputan_pencarian%'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($koneksi,"select tb_kamar.*, tb_fasilitas_kamar.* from tb_fasilitas_kamar LEFT JOIN tb_kamar on tb_kamar.id_kamar = tb_fasilitas_kamar.id_kamar LIMIT $posisi, $batas") or die (mysqli_error());
			}
		} else {
			$sql = mysqli_query($koneksi,"select tb_kamar.*, tb_fasilitas_kamar.* from tb_fasilitas_kamar LEFT JOIN tb_kamar on tb_kamar.id_kamar = tb_fasilitas_kamar.id_kamar LIMIT $posisi, $batas") or die (mysqli_error());
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
					<td align="center"><?php echo $data['tipe_kamar']; ?></td>
					<td align="center"><?php echo $data['nama_fasilitas_kamar']; ?></td>
					<td align="center">
						<a href="?halaman=fasilitas_kamar&action=edit&id_fasilitas_kamar=<?php echo $data['id_fasilitas_kamar'] ?>"><button>Edit</button></a>
						<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=fasilitas_kamar&action=hapus&id_fasilitas_kamar=<?php echo $data['id_fasilitas_kamar'] ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}

		}
		?>
	</table>

	<div style="padding-top: 10px;float:right;">
		<a href="?halaman=fasilitas_kamar&action=tambah" target=""><button>Tambah</button></a>
	</div>
</fieldset>