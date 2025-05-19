<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BELAJAR CRUD PHP - TAMBAH MAHASISWA</title>
    <style>
        body {
            background-image: url('./bg1.jpg');
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
            background-color: rgba(255, 255, 255, 0.95);
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
    <h2>FITUR TAMBAH MAHASISWA UIM YOGYA</h2>
    <a href="index.php">← Kembali ke Daftar</a>

    <form action="tambah_aksi.php" method="POST">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" id="nim" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="tempat" id="tempat" rows="3" required></textarea></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <select name="pk" id="pk" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
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
</body>
</html>
