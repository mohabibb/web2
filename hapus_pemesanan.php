<?php
$id_pesanan= @$_GET['id_pesanan'];

mysqli_query($koneksi,"delete from tb_pesanan where id_pesanan ='$id_pesanan'") or die (mysqli_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=pemesanan";
</script>
