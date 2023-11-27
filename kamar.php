<fieldset>
	<legend>Tampil Data Kamar</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post"> 
			<input type="text" name="inputan_pencarian" placeholder="Masukkan tipe_kamar " style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_kamar" value="Cari" style="padding: 3px;" />
		</form>
	</div>

	<table width="100%" border="1px" style="border:1px solid #000; border-collapse:collapse;">
		<tr style="background-color:#fc0;"> 
			<th>Tipe kamar</th>
			<th>Jumlah kamar</th>
			<th>Opsi</th>
			
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_kamar = @$_POST['cari_kamar'];
		if($cari_kamar) {
			if($inputan_pencarian != "") {
				$sql = mysqli_query($koneksi,"select * from tb_kamar where tipe_kamar like '%$inputan_pencarian%'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($koneksi,"select * from tb_kamar") or die (mysqli_error());
			}
		} else {
			$sql = mysqli_query($koneksi,"select * from tb_kamar") or die (mysqli_error());
		}

		$cek = mysqli_num_rows($sql);
		if($cek < 1) {
			?>
			<tr>
				<td colspan="7" align="center" style="padding: 10px;">Data tidak ditemukan </td>
			</tr>
			<?php
		} else {

			while($data = mysqli_fetch_array($sql)) {
			?>
				<tr>
					<td align="center"><?php echo $data['tipe_kamar']; ?></td>
					<td align="center"><?php echo $data['jumlah_kamar']; ?></td>
					<td align="center">
					<a href="?halaman=kamar&action=edit&id_kamar=<?php echo $data['id_kamar'] ?>"><button>Edit</button></a>
					<a href="?halaman=kamar&action=lihat&id_kamar=<?php echo $data['id_kamar'] ?>"><button>Lihat</button></a>
					<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=kamar&action=hapus&id_kamar=<?php echo $data['id_kamar'] ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}

		}
		?>
	</table>

	<div style="padding-top: 10px;float:right;">
		<a href="?halaman=kamar&action=tambah" target=""><button>tambah</button></a>
	</div>
</fieldset>