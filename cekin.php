<?php
$id_pesanan = @$_GET['id_pesanan'];

mysqli_query($koneksi,"UPDATE tb_pesanan SET status_pemesan='cekin' where id_pesanan ='$id_pesanan'") or die (mysql_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=pemesanan";
</script>
