<?php 
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Buku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="index.php">Toko Buku</a></h1>
			<ul>
				<li><a href="produk.php">Produk</a></li>
			</ul>
		</div>
	</header>

	<!-- search -->
	<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- category -->
	<div class="section">
		<div class="container">
			<h3>Kategori</h3>
			<div class="box">
				<?php 
					$kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
					<a href="produk.php?kat=<?php echo $k['category_id'] ?>">
						<div class="col-5 cont-test">
							<img src="img/res.jpg" width="50px" style="margin-bottom:5px;">
							<div class="container">
							<p style="margin-bottom: 10px;"><?php echo $k['category_name'] ?></p>
							</div>
			
						</div>
					</a>
				<?php }}else{ ?>
					<p>Kategori tidak ada</p>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- new product -->
	<div class="section">
		<div class="container">
			<h1 style="font-weight:1; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"> PRODUK TERBARU</h1>
			<div class="box">
				<?php 
					$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
					if(mysqli_num_rows($produk) > 0){
						while($p = mysqli_fetch_array($produk)){
				?>	
					<a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
						<div class="col-4">
							<img src="produk/<?php echo $p['product_image'] ?>">
							<div class="container cont-test">
							<p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
							<p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
							</div>
						</div>
					</a>
				<?php }}else{ ?>
					<p>Produk tidak ada</p>
				<?php } ?>
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