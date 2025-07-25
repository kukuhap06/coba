<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];
    $q = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    
    if ($q && mysqli_num_rows($q) > 0) {
        $data = mysqli_fetch_assoc($q);
        if (password_verify($password, $data['password'])) {
            $_SESSION['user_id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['nim'] = $data['nim'] ?? null;
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah.";
        }
    } else {
        $error = "User tidak ditemukan.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Presensi</title>
    <style>
        
:root {
    --primary-neon: #00ffff; /* Cyan Neon */
    --secondary-neon: #ff00ff; /* Magenta Neon */
    --dark-bg: #1a1a2e; /* Dark Blue-Purple */
    --darker-bg: #0f0f1a; /* Even Darker Blue-Purple */
    --light-text: #e0e0e0; /* Off-white for readability */
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
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: 
        radial-gradient(circle at 10% 20%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 90% 80%, rgba(255, 0, 255, 0.1) 0%, transparent 50%);
    background-attachment: fixed;
}

/* Login Container */
.login-container {
    background: rgba(10, 10, 20, 0.7);
    border-radius: 10px;
    padding: 2rem;
    box-shadow: 0 0 30px rgba(0, 255, 255, 0.5);
    border: 1px solid var(--primary-neon);
    width: 400px;
    text-align: center;
}

/* Title and Description */
.text-center h2 {
    color: var(--primary-neon);
    margin-bottom: 1rem;
    font-family: 'Press Start 2P', cursive; /* Pixelated retro font */
    text-shadow: var(--glow-strength) var(--primary-neon);
}

.text-center p {
    color: var(--light-text);
    margin-bottom: 1.5rem;
}

/* Form Group */
.form-group {
    margin-bottom: 1.5rem;
    text-align: left;
}

.form-group label {
    color: var(--secondary-neon);
    display: block;
    margin-bottom: 0.5rem;
    font-weight: bold;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid var(--primary-neon);
    border-radius: 5px;
    background: rgba(0, 0, 0, 0.5);
    color: var(--light-text);
    transition: border-color 0.3s, box-shadow 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: var(--secondary-neon);
    box-shadow: var(--glow-strength) var(--secondary-neon);
}

/* Button */
.button {
    background-color: var(--primary-neon);
    color: var(--dark-bg);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    box-shadow: var(--glow-strength) var(--primary-neon);
}

.button:hover {
    background-color: var(--secondary-neon);
    box-shadow: var(--glow-strength) var(--secondary-neon);
}

/* Error Message */
.error {
    color: var(--secondary-neon);
    margin-top: 1rem;
    font-weight: bold;
    text-shadow: var(--glow-strength) var(--secondary-neon);
}
    </style>
</head>
<body>
    <div class="login-container">
        <div class="text-center">
            <h2>Login Presensi</h2>
            <p>Masukkan username dan password Anda</p>
        </div>
        
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="Masukkan username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Masukkan password">
            </div>
            
            <button type="submit" class="button">Login</button>
            
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>