<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] != true){
  header("location:../login.php");
}
require("../utils.php");
if(!isset($_GET["id"])&&!isset($_GET["kelas"])){
  header("location:absen.php");
}
$id = $_GET["id"];
$kelas= $_GET["kelas"];
$dataAwal = query("select nama ,kelamin from siswa where id ='$id'");
$result = mysqli_fetch_assoc($dataAwal);
if(isset($_POST["submit"])){
  $nama = strtolower($_POST["nama"]);
  $kelamin =$_POST["kelamin"];
  $query = query("update siswa 
                  set nama ='$nama',
                  kelamin = '$kelamin' where id ='$id'");
  if($query == true){
    $berhasil = true;
  }else{
    $berhasil = false;
  }
}
?>

<html>
  <head>
    <title>E - Absen</title>
   <link rel="stylesheet" href="../css/ubahSiswa.css" type="text/css" media="all" />
  </head>
  <body>
    <h1>Ubah Siswa</h1>
    <form action="" method="post" autocomplete="off">
      <?if(isset($berhasil) && $berhasil== true):?>
      <p>data berhasil di ubah</p>
      <?endif;?>
      <input type="text" placeholder="masukkan nama baru untuk <?=$result["nama"]?>" 
      name="nama"
      required>
      <div class="form-control">
      <label >
      <input type="radio"name="kelamin" value="l" required>Laki-laki
      </label>
      <label >
        
      <input type="radio"name="kelamin" value="p" required>Perempuan
      </label>
      </div>
      <input type="submit" value="kirim" name="submit">
      <a href="absen.php?kelas=<?=$kelas?>">back</a> 
    </form>
  </body>
</html>