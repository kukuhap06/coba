<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT MAHASISWA</title>
    <style>
        body {
            background-image: url('./bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            text-shadow: 0 0 5px #00ffff, 0 0 10px #ff00ff;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #fff;
            text-shadow: 0 0 5px #000, 0 0 10px #1e90ff;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #fff;
            background-color: #dc3545;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.4);
            transition: background 0.3s ease;
        }

        a:hover {
            background-color: #a71d2a;
        }

        form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            color: #000;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #1e7bf4;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>FITUR EDIT MAHASISWA UIM YOGYA</h2>
    <?php
    include 'koneksi.php';
    $nim = $_GET['id'];
    $data = mysqli_query($koneksi, "SELECT * from mahasiswa where nim='$nim'");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <a href="index.php">← Kembali ke Daftar</a>
        <form action="edit_aksi.php" method="POST">
            <table>
                <tr>
                    <td>NIM</td>
                    <td><input type="hidden" name="nim" id="nim" value="<?php echo $d['nim']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo $d['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>
                        <textarea name="tempat" id="tempat" rows="3"><?php echo $d['tempat']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <select name="pk" id="pk">
                            <option selected value="<?php echo $d['pk']; ?>"><?php echo ucfirst($d['pk']); ?></option>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <input type="submit" value="SIMPAN">
                    </td>
                </tr>
            </table>
        </form>
    <?php } ?>
</body>

</html>
