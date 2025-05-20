<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BELAJAR CRUD PHP - TAMBAH MAHASISWA</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

    body {
      background-image: url('./bg1.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      font-family: 'Orbitron', sans-serif;
      color: #00fff7;
      text-shadow: 0 0 5px #00fff7, 0 0 10px #ff00f7;
      margin: 0;
      padding: 40px;
    }

    h2 {
      text-align: center;
      color: #ff00f7;
      text-shadow: 0 0 10px #ff00f7, 0 0 20px #00fff7;
      margin-bottom: 30px;
    }

    a {
      display: inline-block;
      margin-bottom: 20px;
      color: #fff;
      background-color: #ff0055;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 6px;
      box-shadow: 0 0 10px #ff0055, 0 0 20px #ff0099;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    a:hover {
      background-color: #ff3385;
      transform: scale(1.05);
    }

    form {
      background-color: rgba(0, 0, 0, 0.75);
      padding: 30px;
      border-radius: 10px;
      max-width: 600px;
      margin: auto;
      color: #00fff7;
      box-shadow: 0 0 20px #00fff7, 0 0 40px #ff00f7;
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
      padding: 12px;
      border: 1px solid #00fff7;
      border-radius: 6px;
      font-size: 14px;
      background-color: #1a1a1a;
      color: #00fff7;
      box-shadow: 0 0 5px #00fff7;
    }

    input[type="text"]:focus,
    textarea:focus,
    select:focus {
      outline: none;
      box-shadow: 0 0 10px #ff00f7, 0 0 20px #00fff7;
    }

    input[type="submit"] {
      background-color: #ff00f7;
      color: #000;
      padding: 12px 24px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      box-shadow: 0 0 10px #ff00f7, 0 0 20px #00fff7;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #ff66ff;
      transform: scale(1.05);
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
