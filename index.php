<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BELAJAR CRUD PHP</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <h2 class="text-center">BELAJAR CRUD MAHASISWA UIM YOGYA</h2>
  <br />

  <div class="tambah-button">
    <a href="tambah.php">
      <button class="button"><span>Tambah Mahasiswa</span></button>
    </a>
  </div>

  <table class="table">
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>ALAMAT</th>
      <th>JENIS KELAMIN</th>
      <th>AKSI</th>
    </tr>

    <?php
    include 'koneksi.php';
    $no = 1;
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    while ($d = mysqli_fetch_array($data)) {
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nim']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['tempat']; ?></td>
        <td><?php echo $d['pk']; ?></td>
        <td class="action-buttons">
          <a href="edit.php?id=<?php echo $d['nim'] ?>">
            <button type="button" class="btn btn-warning">EDIT</button>
          </a>
          <a href="hapus.php?id=<?php echo $d['nim'] ?>">
            <button type="button" class="btn btn-danger">HAPUS</button>
          </a>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>
