<fieldset>
      <legend>Lihat Data Pemesanan</legend>

      <?php
      $id_pesanan = @$_GET['id_pesanan'];
      $sql = mysqli_query($koneksi,"select * from tb_pesanan where id_pesanan = '$id_pesanan'") or die (mysql_error());
      $data = mysqli_fetch_array($sql);
      ?>

       <form action="" method="post" enctype="multipart/form-data">
        <table>
             <tr>
                  <td>Id Pesanan</td>
                  <td>:</td>
                  <td><?php echo $data['id_pesanan']; ?> </td>
             </tr>
             <tr>
                  <td>Tipe Kamar</td>
                  <td>:</td>
                  <td> <?php
                    $id_kamar = @$_GET['id_kamar'];
                    $sql1= mysqli_query($koneksi,"select tb_pesanan.*,tb_kamar.* FROM tb_pesanan LEFT JOIN tb_kamar on tb_kamar.id_kamar = tb_pesanan.id_kamar where id_pesanan='$id_pesanan'");
                    while($data1 = mysqli_fetch_array($sql1)){
                    ?>
                    <?php echo $data1['tipe_kamar'];
                    }
                    ?>
               </td>
             </tr>
             <tr>
                  <td>Nama Pemesan</td>
                  <td>:</td>
                  <td><?php echo $data['nama_pemesan']; ?></td>
             </tr>
             <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $data['email_pemesan']; ?></td>
                  
             </tr>
             <tr>
                  <td>No Hp</td>
                  <td>:</td>
                  <td><?php echo $data['no_hp']; ?></td>
             </tr>
             <tr>
                  <td>Tanggal CekIn</td>
                  <td>:</td>
                  <td><?php echo $data['tanggal_cekin']; ?></td>
             </tr>
             <tr>
                  <td>Tanggal CekOut</td>
                  <td>:</td>
                  <td><?php echo $data['tanggal_cekout']; ?></td>
             </tr>
             <tr>
                  <td>Jumlah Kamar</td>
                  <td>:</td>
                  <td><?php echo $data['jumlah_kamar']; ?> </td>
             </tr>
             <tr>
                  <td>Nama Tamu</td>
                  <td>:</td>
                  <td><?php echo $data['nama_tamu']; ?> </td>
             </tr>
             <tr>
                  <td>Status Pemesan</td>
                  <td>:</td>
                  <td><?php echo $data['status_pemesan']; ?> </td>
             </tr>
             <tr>
                  <td>Tanggal Pesan</td>
                  <td>:</td>
                  <td><?php echo $data['tanggal_pesan']; ?> </td>
             </tr>
       </table>
   </form>
</fieldset>