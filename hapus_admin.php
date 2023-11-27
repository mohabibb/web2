<?php
$kode_user = @$_GET['kode_user'];

mysqli_query($koneksi,"delete from tb_login where kode_user ='$kode_user'") or die (mysqli_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=admin";
</script>
