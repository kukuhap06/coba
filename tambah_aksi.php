<?php
include 'koneksi.php';


$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$pk = $_POST['pk'];

mysqli_query($koneksi,"INSERT INTO mahasiswa values ('$nim','$nama','$tempat','$pk')");

header("location:index.php")
?>