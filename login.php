<?php
ob_start();
@session_start();
include "../inc/koneksi.php"; 

if(@$_SESSION['administrator'] || @$_SESSION['resepsionis']) {
	header("location: index.php");
} else if(@$_SESSION['user']) {
    header("location: user/index.php");
} else {
?>

<!DOCTYPE html>
<html>
<head>
        <title>Halaman Login</title>
		<link rel='stylesheet' href="css/main_login.css" />
</head>
<body>
                    <div id="utama">
                        <div id="judul">
					        Halaman Login
					    </div>
						
						<div id="inputan">
						    <form action="" method="post">
						<div>
							 <input type="text" name="user" placeholder="Username" class="lg" />
						</div>
						<div style="margin-top:10px;">
							 <input type="password" name="pass" placeholder="Password" class="lg" />
						</div>
						<div style="margin-top:10px;">
							 <input type="submit" name="login" value="Login" class="btn" />
						
						</div>
						    </form>
							
							<?php
							$user = @$_POST['user'];
							$pass = @$_POST['pass'];
							$login = @$_POST['login'];
							
							if($login) {
							        if($user== "" || $pass == "") {
								          ?><script type="text/javascript">alert("Username / password tidak boleh kosong");</script><?php
									} else{
										$sql = mysqli_query($koneksi,"select * from tb_login where username = '$user' and password = md5('$pass')") or die (mysqli_error());
										$data = mysqli_fetch_array($sql);
										$cek = mysqli_num_rows($sql);
									}if($cek >= 1) {
										if($data['level'] == "administrator") {
			                            @$_SESSION['administrator'] = $data['kode_user'];
										header("location: index.php");
									}  else if($data['level'] == "resepsionis") {
		                                @$_SESSION['resepsionis'] = $data['kode_user'];
										header("location: index.php");
									}	else if($data['level'] == "user") {
		                                @$_SESSION['user'] = $data['kode_user'];
										header("location: user/index.php");
									}
								} else {
									echo "Login gagal";
							}
						    }
							?>
							
						</div>
                    </div>

				</body>
</html>

<?php
	
}
?>