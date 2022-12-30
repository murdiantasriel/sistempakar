<?php 
include('db.php');
define('SITEURL','http://localhost/TokoBuku/');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Toko Buku</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<!-- header -->
	<header>
		<div class="container">
			<h1><a href="dashboard.php">Toko Buku</a></h1>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="manage-admin.php">Admin</a></li>
				<li><a href="data-kategori.php">Data Kategori</a></li>
				<li><a href="data-produk.php">Data Produk</a></li>
				<li><a href="keluar.php">Keluar</a></li>
			</ul>
		</div>
	</header>

    <div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br>

        <!-- button for add -->
        <a class="btn" href="add-admin.php" >Add Admin</a>
        <br><br>
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <!-- menampilkan data ke web admin -->
            <?php
            $sql='SELECT * FROM tb_admin';
            $res=mysqli_query($conn,$sql);
            if($res==true){
                $count=mysqli_num_rows($res);
                $number=1;

                if($count>0){
                    while($rows=mysqli_fetch_assoc($res)){
                        $id=$rows['admin_id'];
                        $full_name=$rows['admin_name'];
                        $username=$rows['username'];

                        ?>
                         <tr>
                            <td><?php echo $number++;?></td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $username;?></td>
                            <td>

                                <a class="btn-secondary" href="<?php echo SITEURL;?>profil.php?id=<?php echo $id?>">Update </a> 
                                <a class="btn-danger" href="<?php echo SITEURL;?>delete-admin.php?id=<?php echo $id?>">Delete </a> 
                            
                            </td>
                        </tr>
                        <?php

                    }
                }
            }
            ?>



        </table>
    </div>
    </div>
  

</body>
<section class="footer1">
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