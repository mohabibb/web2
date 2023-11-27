<fieldset>
	<legend>Tampil Data Admin</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post"> 
			<input type="text" name="inputan_pencarian" placeholder="Masukkan username" style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_admin" value="Cari" style="padding: 3px;" />
		</form>
	</div>

	<table width="100%" border="1px" style="border:1px solid #000; border-collapse:collapse;">
		<tr style="background-color:#fc0;"> 
			<th>Username</th>
			<th>Nama admin</th>
			<th>Alamat admin</th>
			<th>No tlp admin</th>
			<th>Opsi</th>
		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_admin = @$_POST['cari_admin'];
		if($cari_admin) {
			if($inputan_pencarian |= "") {
				$sql = mysqli_query($koneksi,"select * from tb_login where username like '%$inputan_pencarian%'and level != 'administrator'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($koneksi,"select * from tb_login where level != 'administrator'") or die (mysqli_error());
			}
		} else { 
			$sql = mysqli_query($koneksi,"select * from tb_login where level != 'administrator'") or die (mysqli_error());
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
					<td align="center"><?php echo $data['username']; ?></td>
					<td align="center"><?php echo $data['nama_admin']; ?></td>
					<td align="center"><?php echo $data['alamat_admin']; ?></td>
					<td align="center"><?php echo $data['no_tlp_admin']; ?></td>
					<td align="center">
						<a href="?halaman=edit_admin&kode_user=<?php echo $data['kode_user'] ?>"><button>Edit</button></a>
						<a onclick="return confirm('Yakin ingin menghapus data ?')" href="?halaman=hapus_admin&kode_user=<?php echo $data['kode_user'] ?>"><button>Hapus</button></a>
					</td>
				</tr>
			<?php
			}
		}
		?>
	</table>
</fieldset>