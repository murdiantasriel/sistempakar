<?php 
	error_reporting(0);
	include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

	$produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
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
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="produk/<?php echo $p->product_image ?>" width="100%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->product_name ?></h3>
					<h4>Rp. <?php echo number_format($p->product_price) ?></h4>
					<p>Deskripsi :<br>
						<?php echo $p->product_description ?>
					</p>
					<div class="container cont-test">
					<p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->admin_telp ?>&text=Hai, saya tertarik dengan produk Anda." target="_blank">
						Hubungin via Whatsapp
						<img src="img/wa.png" width="50px"></a>
						</div>
					</p>
				</div>
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