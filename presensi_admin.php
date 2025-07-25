<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : date('Y-m-d');
$query = "SELECT m.nim, m.nama, p.tanggal, p.waktu_masuk, p.waktu_keluar, p.status 
          FROM presensi p JOIN mahasiswa m ON p.nim = m.nim 
          WHERE p.tanggal = '$tanggal' ORDER BY p.waktu_masuk DESC";
$data = mysqli_query($koneksi, $query);
$page_title = "Presensi Admin";
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Presensi</title>
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
    max-width: 1200px;
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
    margin-bottom: 1.5rem;
    text-shadow: var(--glow-strength) var(--primary-neon);
}

/* Form Styles */
form {
    display: flex;
    justify-content: center;
    margin-bottom: 1.5rem;
}

form input[type="date"] {
    padding: 0.5rem;
    border: 1px solid var(--primary-neon);
    border-radius: 4px;
    background: rgba(0, 0, 0, 0.5);
    color: var(--light-text);
    margin-right: 0.5rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input[type="date"]:focus {
    outline: none;
    border-color: var(--secondary-neon);
    box-shadow: var(--glow-strength) var(--secondary-neon);
}

form .button {
    background-color: var(--primary-neon);
    color: var(--dark-bg);
    padding: 0.5rem 1rem;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

form .button:hover {
    background-color: var(--secondary-neon);
    transform: translateY(-2px);
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

table thead {
    background-color: var(--secondary-neon);
}

table th, table td {
    padding: 0.75rem;
    text-align: center;
    border: 1px solid var(--primary-neon);
}

table th {
    color: var(--light-text);
}

table td {
    color: var(--light-text);
}

table tr:hover {
    background-color: rgba(0, 255, 255, 0.1);
    color: var(--primary-neon);
}
    </style>
</head>
<body>
<div class="dashboard">
    <h2>Presensi Tanggal <?= $tanggal ?></h2>
    <form method="GET">
        <input type="date" name="tanggal" value="<?= $tanggal ?>">
        <button type="submit" class="button">Filter</button>
    </form>
    <table>
        <thead>
            <tr><th>NIM</th><th>Nama</th><th>Masuk</th><th>Keluar</th><th>Status</th></tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $row['nim'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['waktu_masuk'] ?></td>
                    <td><?= $row['waktu_keluar'] ?: '-' ?></td>
                    <td><?= $row['status'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
<?php include 'includes/footer.php'; ?>