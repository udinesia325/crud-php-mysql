<?
    $host = "localhost";
    $username="root";
    $password="root";
    $db ="absen";
    
    $konek = mysqli_connect($host,$username,$password,$db);
    if (!$konek) {
        die("<h1>505</h1><p>server error</p>");
    }
