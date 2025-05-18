<?php
include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$tempat = $_POST['tempat'];
$pk = $_POST['pk'];



$result = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama',tempat='$tempat',pk='$pk' WHERE nim='$nim' ");
if ($result) {
    // Kueri berhasil (atau menghasilkan hasil jika SELECT)
    header("location:index.php");
} else {
    // Kueri gagal
    echo "Error: " . $conn->error;
}