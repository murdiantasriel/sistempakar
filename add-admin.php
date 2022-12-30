<?php 
	session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
	}

	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
	$d = mysqli_fetch_object($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bukawarung</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">bukawarung</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="manage-admin.php">Admin</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Profil Admin</h3>
			<div class="box">
				<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Lengkap" class="input-control">
					<input type="text" name="user" placeholder="Username" class="input-control">
					<input type="password" name="password" placeholder="Password" class="input-control">
					<input type="text" name="hp" placeholder="No Hp" class="input-control" >
					<input type="email" name="email" placeholder="Email" class="input-control" >
					<input type="text" name="alamat" placeholder="Alamat" class="input-control" >
					<input type="submit" name="submit" value="Tambah Admin" class="btn">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						$nama 	= $_POST['nama'];
						$user 	= $_POST['user'];
                        $password=md5($_POST['password']);
						$hp 	= $_POST['hp'];
						$email 	= $_POST['email'];
						$alamat = $_POST['alamat'];

						$update = mysqli_query($conn, "INSERT INTO tb_admin SET 
										admin_name = '$nama',
										username = '$user',
                                        password='$password',
										admin_telp = '$hp',
										admin_email = '$email',
										admin_address = '$alamat'");
						if($update){
							echo '<script>alert("Tambah admin berhasil")</script>';
							echo '<script>window.location="manage-admin.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($conn);
						}

					}
				?>
			</div>

			
		</div>
	</div>
	

	<!-- footer -->
	
	<section class="footer">
				<section class="social">
                    <div class="container text-center">
                        <ul>
                            <li>
                                <a href="https://web.facebook.com/asriel.yen/"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/asrilmurdian/"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                            </li>
                            <li>
                                <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                            </li>
                        </ul>
                    </div>
                </section>
                    <div class="container text-center">
                        <p>All rights reserved. Designed By <a href="https://asrilmurdian.w3spaces.com/">Asril Murdian | Ahmad Alpin</a></p>
                    </div>
                </section>
</body>
</html>