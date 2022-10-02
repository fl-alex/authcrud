<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
  header('Location: index.php');
exit();

}


require_once 'Db_connect.php';
$db_ob = New Db_connect();
$connection = $db_ob->MakeConnection();


if ($connection->connect_errno!=0){
  echo "Error ".$connection->connect_errno." Opis " .$connection->connect_error;
}
else {
  
  $login = mysqli_real_escape_string($connection, htmlentities($_POST['login'], ENT_QUOTES,"UTF-8"));
  $haslo = mysqli_real_escape_string($connection, htmlentities($_POST['haslo'], ENT_QUOTES,"UTF-8"));
  
  $sql = "SELECT * FROM users WHERE `name` = '$login' AND `password`='$haslo'";
  
  if ($rezultat = $connection->query($sql)){
      if ($rezultat->num_rows>0){
          $_SESSION['is_logged']=true;
          $wiersz = $rezultat->fetch_assoc();
          $_SESSION['id'] = $wiersz['id'];
          $_SESSION['user'] = $wiersz['name'];
          $_SESSION['email'] = $wiersz['email'];
          unset($_SESSION['blad']);
          $rezultat->free_result();
          header('Location: ./Views/Articles/index.php');
      }
      else {
          $_SESSION['blad']="<span style='color:red'>ERROR!</span>";
          header('Location: index.php');
      }

  }

  $connection->close();
}






?>