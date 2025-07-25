<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin' || !isset($_GET['id'])) {
    header("Location: login.php");
    exit;
}
$nim = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");
mysqli_query($koneksi, "DELETE FROM presensi WHERE nim='$nim'");
header("Location: data_mahasiswa.php");
exit;
?>