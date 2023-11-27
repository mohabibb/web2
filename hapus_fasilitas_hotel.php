<?php
$id_fasilitas_hotel = @$_GET['id_fasilitas_hotel'];

mysqli_query($koneksi,"delete from tb_fasilitas_hotel where id_fasilitas_hotel ='$id_fasilitas_hotel'") or die (mysql_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=fasilitas_hotel";
</script>
