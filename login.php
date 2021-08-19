<?php
session_start();
require_once("utils.php");
if (isset($_POST["submit"])) {
  $username = strtolower($_POST["username"]);
  $password = strtolower($_POST["password"]);
  $query = query("select username, password from login ");
  $result =mysqli_fetch_assoc($query);

  $verif = password_verify($password,$result["password"]);
  if( $username == $result["username"]&&$verif === true){
    $_SESSION["login"] = true;
    header("location:index.php");
    exit;
  }else {
    $_SESSION["login"] = false;
  }
}

?>

<html>
  <head>
    <title>E - Absen</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
    <form action="" method="post" autocomplete="off">
      <h1>Login</h1>
        <input type="text" name="username" placeholder="username" required>
        <input type="password" name="password" placeholder="password" required>
      <input type="submit" name="submit"value="login">
    </form>
  </body>
</html>