<?php
$id_kamar = @$_GET['id_kamar'];

mysqli_query($koneksi,"delete from tb_kamar where id_kamar ='$id_kamar'") or die (mysqli_error());
?>

<script type="text/javascript">
    window.location.href="?halaman=kamar";
</script>
