<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit;
}
$nim = $_SESSION['nim'];
$mhs = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'"));
$today = date('Y-m-d');
$presensi = mysqli_query($koneksi, "SELECT * FROM presensi WHERE nim='$nim' AND tanggal='$today'");
$status = mysqli_fetch_assoc($presensi);
$page_title = "User Dashboard";
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <style>
/* Global Styles */
:root {
    --primary-neon: #00ffff; /* Cyan Neon */
    --secondary-neon: #ff00ff; /* Magenta Neon */
    --dark-bg: #1a1a2e; /* Dark Blue-Purple */
    --darker-bg: #0f0f1a; /* Even Darker Blue-Purple */
    --light-text: #e0e0e0; /* Off-white for readability */
    --card-bg: rgba(10, 10, 20, 0.7); /* Semi-transparent card background */
    --glow-strength: 0 0 10px, 0 0 20px, 0 0 30px;
}

@import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Press+Start+2P&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Orbitron', sans-serif; /* Futuristic font */
}

body {
    background-color: var(--dark-bg);
    color: var(--light-text);
}

/* Dashboard Styles */
.dashboard {
    max-width: 600px;
    margin: 2rem auto;
    padding: 1rem;
    background: var(--card-bg);
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
}

/* Title Styles */
.dashboard h2 {
    text-align: center;
    color: var(--primary-neon);
    margin-bottom: 1rem;
    text-shadow: var(--glow-strength) var(--primary-neon);
}

/* Paragraph Styles */
.dashboard p {
    text-align: center;
    margin: 0.5rem 0;
}

/* Button Styles */
.button {
    background-color: var(--primary-neon);
    color: var(--dark-bg);
    padding: 0.5rem 1rem;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    margin: 1rem auto;
    transition: background-color 0.3s, transform 0.3s;
}

.button:hover {
    background-color: var(--secondary-neon);
    transform: translateY(-2px);
}

    </style>
    <body>
<div class="dashboard">
    <h2>Halo, <?= htmlspecialchars($mhs['nama']) ?></h2>
    <p>NIM: <?= htmlspecialchars($mhs['nim']) ?></p>
    <?php if ($status): ?>
        <?php if ($status['waktu_keluar']): ?>
            <p>✅ Anda sudah presensi masuk dan keluar hari ini.</p>
        <?php else: ?>
            <p>⏳ Anda sudah presensi masuk pukul <?= $status['waktu_masuk'] ?></p>
            <a href="presensi_keluar.php" class="button">Presensi Keluar</a>
        <?php endif; ?>
    <?php else: ?>
        <p>⚠️ Anda belum presensi hari ini.</p>
        <a href="presensi_masuk.php" class="button">Presensi Masuk</a>
    <?php endif; ?>
    <br><br>
    <a href="riwayat_presensi.php" class="button">Riwayat Presensi</a>
</div>
</body>
<?php include 'includes/footer.php'; ?>