<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $pk = $_POST['pk'];
    mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, tempat, pk) VALUES ('$nim', '$nama', '$tempat', '$pk')");
    header("Location: data_mahasiswa.php");
    exit;
}
$page_title = "Tambah Mahasiswa";
include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
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
    margin-bottom: 1.5rem;
    text-shadow: var(--glow-strength) var(--primary-neon);
}

/* Form Styles */
form {
    display: flex;
    flex-direction: column;
}

form input[type="text"],
form select {
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid var(--primary-neon);
    border-radius: 4px;
    background: rgba(0, 0, 0, 0.5);
    color: var(--light-text);
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input[type="text"]:focus,
form select:focus {
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

    </style>
    <body>
<div class="dashboard">
    <h2>Tambah Mahasiswa</h2>
    <form method="POST">
        <input type="text" name="nim" placeholder="NIM" required>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="tempat" placeholder="Alamat" required>
        <select name="pk" required>
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <button type="submit" class="button">Simpan</button>
    </form>
</div>
</body>
<?php include 'includes/footer.php'; ?>