<?php
include('db.php');
// include('login-check.php');
define('SITEURL','http://localhost/TokoBuku/');

$id=$_GET['id'];
$sql="DELETE FROM tb_admin WHERE admin_id=$id";
$res=mysqli_query($conn,$sql);
if($res==true){
    echo '<script>alert("Admin Berhasil dihapus!")</script>';
    header('location:'.SITEURL.'manage-admin.php');
}
else{
    echo '<script>alert("Gagal menghapus admin!")</script>';
    header('location:'.SITEURL.'manage-admin.php');
}

?>