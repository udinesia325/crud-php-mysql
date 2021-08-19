<?
require_once("utils.php");

if (isset($_GET["kelas"])&&isset($_GET["kode"])) {
    $kelas = $_GET["kelas"];
    $kode  = $_GET["kode"];

    if (hash("sha1",$kelas) == $kode) {
        $result = query("delete from kelas where nama_kelas = '$kelas'");
        if($result == true){
            header("location:index.php?hapus=true");
            exit;
        }else{
            header("location:index.php?hapus=false");
        }
    }else{
        header("location:index.php");
    }
}else{
    header("location:index.php");
}