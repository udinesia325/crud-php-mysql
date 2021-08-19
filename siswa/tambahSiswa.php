<?php
session_start();
if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
  header("location:../login.php");
}
require_once("../utils.php");
if(!isset($_GET["kelas"])){
    header("location:absen.php");
    exit;
}

 $nama_kelas = strtolower($_GET["kelas"]);
  $_SESSION["tambah_data"]=false;
if(isset($_POST["kirim"])){
    $nama = strtolower($_POST["nama"]);
    $kelamin = $_POST["kelamin"];
    $cek_siswa = query("select * from siswa where nama_kelas = '$nama_kelas' and nama = '$nama'");
    if(mysqli_num_rows($cek_siswa)>0){
        
        $data_telah_ada = true;
        
    }else{
        $data_telah_ada = false;
    
    $query = query("insert into siswa (nama_kelas,nama,kelamin)values('$nama_kelas','$nama','$kelamin')");
    if($query == 1){
        $_SESSION["tambah_data"] = true;
    }else{
        die();
        $gagal = true;
    }
    }
}
?>
<html>
    <head>
        <title>
            E - Absen
        </title>
        <link rel="stylesheet" href="../css/tambahSiswa.css">
    </head>
    <body>
        <div class="container">
            <h1 justify="center">Siswa baru</h1>
            <form action="" method="post"autocomplete="off">
                <?php if(isset($data_telah_ada)&&$data_telah_ada == true):?>
                <p>data tersebut siswa telah ada</p>
                <?php endif;?>
                <?php if(isset($gagal)&& $gagal == true):?>
                    <p>gagal menambah data</p>
                <?php endif?>
                <?php if(isset($_SESSION)&&$_SESSION["tambah_data"]==true):?>
                    <p>siswa berhasil di tambahkan!</p>
                <?php endif;?>
                <input type="text"name="nama" placeholder="Masukkan nama" required>
                <section class="kelamin">
                <input type="radio" value="l" name="kelamin"id="l" checked><label for="l">Laki - laki</label>
                <input type="radio" value="p" name="kelamin"id="p"><label for="p">Perempuan</label>
                </section>
                <input type="submit" name="kirim" value="Tambah">
                
                <a class="back"href="absen.php?kelas=<?=$nama_kelas?>">&lt;- kembali</a>
            </form>
        </div>
    </body>
</html>
<?php
$_SESSION["tambah_data"] = false;
?>