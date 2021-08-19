<?php
require_once("../utils.php");
if(!isset($_GET["kelas"])){
  header("location:../index.php");
  exit;
}
$kelas = $_GET["kelas"];
$sql = query("select * from siswa where nama_kelas = '$kelas'");
$sqlKelas = query("select * from kelas where nama_kelas = '$kelas'");
?>

<html>
  <head>
    <title>E - Absen</title>
    <link rel="stylesheet" href="../css/absen.css">
  </head>
  <body>
    <h1>Absen Siswa</h1>
    <a href="../index.php" class="back">🔙</a>
  <br>
   <div class="container">
     <?while($kls = mysqli_fetch_assoc($sqlKelas)):?>
     <p><b>Kelas : </b><?= strtoupper($kls["nama_kelas"])?></p>
     <p><b>Wali Kelas : </b><?= strtoupper($kls["wali_kelas"])?></p>
     <?endwhile;?>
        <table>
          <tr>
            <thead>
              <th>No</th>
              <th>Nama</th>
              <th>Kelamin</th>
              <th>Daftar</th>
              <th>Opsi</th>
            </thead>
          </tr>
          <?$no = 1; while($data = mysqli_fetch_assoc($sql)):?>
          <tr>
            <td><?= $no++?></td>
            <td><?=$data["nama"]?></td>
            <td><?=strtoupper($data["kelamin"])?></td>
            <td><?=$data["daftar"]?></td>
            <td>
              <button class="edit">Edit</button>
              <button class="hapus" data-hapus="<?=$data["id"]?>">Hapus</button>
              </td>
          </tr>
          <?endwhile;?>
        </table>
    </div>
    <div class="bawah">
      
        <a class="opsi tambah"
href="tambahSiswa.php?kelas=<?=$kelas?>">Tambah Siswa</a>
        <a class="opsi cetak"
href="tambahSiswa.php?kelas=<?=$kelas?>">Cetak Absen</a>
    </div>
  </body>
</html>