<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] != true){
  header("location:login.php");
  exit;
}
  require_once("utils.php");
 
 $data = query("SELECT * FROM kelas") ;
   
$i=1;
 ?>
<html>
    <head>
        <title>E - Absen</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>e - absen</h1>
        <a href="buatKelas.php" class="btn bg-secondary tombol-buat">buat kelas</a>
        <a class="btn bg-danger"
href="logout.php">logout</a>
        <div class="container">
        <?php if(isset($_GET["hapus"])):?>
        <p class="notif">kelas berhasil dihapus</p>
        <script>
        setTimeout(()=>{
            document
            .querySelector(".notif")
            .remove()
        },2000)
        </script>
        <?php endif;?>
        <?if(mysqli_num_rows($data) == 0):?>
        <h1>Kelas Masih Kosong!</h1>
        <? else :?>
        <table cellpadding="10" cellspacing="0">
            <tr>
            <thead>
                <th>No</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Absensi</th>
            </thead>
            <tr>
                <?while($result = mysqli_fetch_assoc($data)):
                    ?>
                <tr>
            <tbody>
                    <td><?= $i++?></td>
                    <td><?=$result["nama_kelas"]?></td>
                    <td><?= $result["wali_kelas"]?></td>
                    <td><a href='siswa/absen.php?kelas=<?= $result["nama_kelas"]?>' class="btn bg-primary">Lihat</a>
<a href='hapusKelas.php?kelas=<?= $result["nama_kelas"]?>&kode=<?= hash("sha1",$result["nama_kelas"])?>' class="btn bg-danger">&times;</a></td>
            </tbody>
            <tr>
                    <?endwhile;?>

        </table>
        <?endif;?>
        </div>
    </body>
</html>