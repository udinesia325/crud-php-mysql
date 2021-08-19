<?php
require_once("../utils.php");
if(!isset($_GET["kelas"])){
  header("location:../index.php");
  exit;
}
$kelas = $_GET["kelas"];
$sql = query("select * from siswa where nama_kelas = '$kelas'");

?>

<html>
  <head>
    <title>E - Absen</title>
    <link rel="stylesheet" href="../css/absen.css">
  </head>
  <body>
    <h1>Absen Siswa</h1>
    <a href="../index.php">🔙</a>
  </body>
</html>