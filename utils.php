<?
require_once("koneksi.php");

function query($query){
    global $konek;
    return mysqli_query($konek,$query);
}