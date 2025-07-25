<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
$nim = $_SESSION['nim'];
$tanggal = date('Y-m-d');
$waktu = date('H:i:s');
$cek = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nim='$nim' AND tanggal='$tanggal'");
if (mysqli_num_rows($cek) === 0) {
    mysqli_query($koneksi, "INSERT INTO presensi (nim, tanggal, waktu_masuk, status) VALUES ('$nim', '$tanggal', '$waktu', 'hadir')");
}
header("Location: user_dashboard.php");
exit;
?>