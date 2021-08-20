<?
require_once("../utils.php");
if(isset($_GET["id"])&&isset($_GET["kelas"])){
  $id = $_GET["id"];
  $kelas=$_GET["kelas"];
  if(query("delete from siswa where id = '$id' and nama_kelas = '$kelas'")>0){
    
    header("location:absen.php?kelas=$kelas");
  }
}
else {
  echo("<a href='absen.php?kelas=$kelas'>gagal menghapus siswa</a>");
}