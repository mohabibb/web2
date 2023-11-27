<?php
$id_fasilitas_kamar = @$_GET['id_fasilitas_kamar'];

mysqli_query($koneksi,"delete from tb_fasilitas_kamar where id_fasilitas_kamar ='$id_fasilitas_kamar'") or die (mysql_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=fasilitas_kamar";
</script>
