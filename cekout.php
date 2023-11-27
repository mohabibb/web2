<?php
$id_pesanan = @$_GET['id_pesanan'];
$sql = mysqli_query($koneksi, "select * from tb_pesanan where id_pesanan ='$id_pesanan'") or die(mysqli_error());
    $data = mysqli_fetch_array($sql);
    $jumlah_kamar=$data['jumlah_kamar'];
    $id_kamar=$data['id_kamar'];

mysqli_query($koneksi,"UPDATE tb_pesanan SET status_pemesan = 'cekout' where id_pesanan ='$id_pesanan'") or die (mysqli_error());
mysqli_query($koneksi,"UPDATE tb_kamar SET jumlah_kamar = jumlah_kamar+'$jumlah_kamar' where id_kamar ='$id_kamar'") or die (mysqli_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=pemesanan";
</script>
