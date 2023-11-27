<fieldset>
	<legend>Tampil Data Pemesanan</legend>

	<div style="margin-bottom: 15px;" align="right">
		<form action="" method="post"> 
			<input type="text" name="inputan_pencarian" placeholder="Masukkan nama_pemesan" style="width: 200px; padding: 5px;" />
			<input type="submit" name="cari_pemesanan" value="Cari" style="padding: 3px;" />
		</form>
	</div>

	<table width="100%" border="1px" style="border:1px solid #000; border-collapse:collapse;">
		<tr style="background-color:#fc0;"> 
			<th>nama_pemesan</th>
			<th>tanggal_cekin</th>
			<th>tanggal_cekout</th>
			<th>status_pemesanan</th>
			<th>Aksi</th>

		</tr>
		<?php
		$inputan_pencarian = @$_POST['inputan_pencarian'];
		$cari_pemesanan = @$_POST['cari_pemesanan'];
		if($cari_pemesanan) {
			if($inputan_pencarian |= "") {
				$sql = mysqli_query($koneksi,"select * from tb_pesanan where nama_pemesan like '%$inputan_pencarian%'") or die (mysqli_error());
			} else {
				$sql = mysqli_query($koneksi,"select * from tb_pesanan") or die (mysqli_error());
			}
		} else {
			$sql = mysqli_query($koneksi,"select * from tb_pesanan") or die (mysqli_error());
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
				$status=$data['status_pemesan'];
			?>
				<tr>
					<td align="center"><?php echo $data['nama_pemesan']; ?></td>
					<td align="center"><?php echo $data['tanggal_cekin']; ?></td>
					<td align="center"><?php echo $data['tanggal_cekout']; ?></td>
					<td align="center"><?php echo $data['status_pemesan']; ?></td>
					<td align="center">
						<a href="?halaman=lihat&id_pesanan=<?php echo $data['id_pesanan'];?>"><button>Lihat</button> </a>
						<?php if($status =='sudah pesan'){?>
						<a onclick="return confirm('Yakin ingin cekin?')" href="?halaman=cekin&id_pesanan=<?php echo $data['id_pesanan'];?>"><button>cekin</button> </a>
					<?php }else if($status=='cekin'){?>
						<a onclick="return confirm('Yakin ingin cekout ?')" href="?halaman=cekout&id_pesanan=<?php echo $data['id_pesanan'];?>"><button>cekout</button> </a>
						<?php } ?>
						<a onclick="return confirm('Yakin ingin menghapus data?')" href="?halaman=hapus&id_pesanan=<?php echo $data['id_pesanan'];?>"><button>Hapus</button> </a>
					</td>
				</tr>
			<?php
			}
		}
		?>
	</table>
	<div style="padding-top:10px;">
	    	<a href="../laporan/cetak pemesanan resepsionis.php" target="_blank"><button>Cetak</button></a>
	    </div>
</fieldset>