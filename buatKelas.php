<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] != true){
  header("location:login.php");
}

require("utils.php");
if (isset($_POST["kirim"])) {
    $nama_kelas = strtolower($_POST["nama_kelas"]);
    $wali_kelas = strtolower($_POST["wali_kelas"]);

    $query = query("insert into kelas values('$nama_kelas','$wali_kelas')");

    $error = mysqli_errno($konek);//1062 data udah ada
    if ($error != 0) {
        $_SESSION["kelas_telah_ada"] = true;
    }
}

?>

<html>
    <head>
        <title>E - Absen</title>
        <link rel="stylesheet" href="css/buatKelas.css">
    </head>
    <body>
        <a href="index.php">&lt;-</a>
        <h1>buat kelas</h1>
        <?php if(isset($_SESSION["kelas_telah_ada"]) && $_SESSION["kelas_telah_ada"] === true):?>
        <div class="popper">kelas telah ada <button onclick="this.parentElement.remove()">tutup</button></div>
        <?php endif;?>
        
        <?php if(mysqli_affected_rows($konek) > 0):?>
        <div class="popper">kelas berhasil dibuat! <button onclick="this.parentElement.remove()">tutup</button>
        </div>
        <?php endif;?>
      
        <form action="" method="post" autocomplete="off">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas" required="required" autofocus>
            <br>
            
            <label for="wali_kelas">Nama Wali Kelas</label>
            <input type="text" name="wali_kelas" id="wali_kelas" required="required">
            <br>
            <button type="submit" name="kirim">Buat Kelas</button>
        </form>
    </body>
</html>
<?php
$_SESSION["kelas_telah_ada"] = false;
?>