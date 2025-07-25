<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("Location: user_dashboard.php");
    exit;
}

// Hitung total mahasiswa
$total_mahasiswa = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM mahasiswa"))['total'];

// Hitung presensi hari ini
$today = date('Y-m-d');
$total_presensi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) as total FROM presensi WHERE tanggal='$today'"))['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
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

/* Header Styles */
.header {
    background-color: var(--darker-bg);
    color: var(--light-text);
    padding: 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 0 15px var(--primary-neon);
}

.header h1 {
    font-family: 'Press Start 2P', cursive; /* Pixelated retro font */
    text-shadow: var(--glow-strength) var(--primary-neon);
}

/* Container Styles */
.container {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 0 1rem;
}

/* Stats Section */
.stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

/* Stat Card Styles */
.stat-card {
    background: var(--card-bg);
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0 20px var(--primary-neon), 0 0 30px rgba(0, 255, 255, 0.5);
}

.stat-card h3 {
    color: var(--secondary-neon);
    margin-bottom: 1rem;
}

.stat-card p {
    font-size: 2rem;
    font-weight: bold;
    color: var(--primary-neon);
    margin: 1rem 0;
}

.stat-card a {
    color: var(--primary-neon);
    text-decoration: none;
    border-bottom: 1px solid var(--primary-neon);
    padding-bottom: 2px;
    transition: color 0.3s;
}

.stat-card a:hover {
    color: var(--secondary-neon);
}

/* Quick Actions Section */
.quick-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

/* Action Button Styles */
.action-btn {
    background-color: var(--primary-neon);
    color: var(--dark-bg);
    padding: 0.75rem 1.5rem;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
    box-shadow: var(--glow-strength) var(--primary-neon);
}

.action-btn:hover {
    background-color: var(--secondary-neon);
    transform: translateY(-2px);
}

/* Logout Button Styles */
.logout-btn {
    background-color: #dc3545; /* Red */
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.logout-btn:hover {
    background-color: #c82333; /* Darker Red */
}

    </style>
</head>
<body>
    <div class="header">
        <h1>Admin Dashboard</h1>
        <div>
            <span>Selamat datang, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
    
    <div class="container">
        <div class="stats">
            <div class="stat-card">
                <h3>Total Mahasiswa</h3>
                <p><?php echo $total_mahasiswa; ?></p>
                <a href="data_mahasiswa.php">Lihat Data</a>
            </div>
            
            <div class="stat-card">
                <h3>Presensi Hari Ini</h3>
                <p><?php echo $total_presensi; ?></p>
                <a href="presensi_admin.php">Lihat Data</a>
            </div>
        </div>
        
        <div class="quick-actions">
            <a href="tambah_mahasiswa.php" class="action-btn">Tambah Mahasiswa</a>
            <a href="presensi_admin.php" class="action-btn">Lihat Presensi</a>
        </div>
    </div>
</body>
</html>