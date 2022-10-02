<?php 

session_start();

if ((isset($_SESSION['is_logged']))&&($_SESSION['is_logged']==true)){
  header('Location: ./Views/Articles/index.php');
  exit();
}

?>

<html>
<head>
  <title>Control Panel</title>
  <meta charset="utf-8">

</head>
<body>


<form action = "login.php" method="post">
 
    <input type="text" name="login" id="form2Example1" class="form-control" /><br>
    <input type="password" name="haslo" id="form2Example2" class="form-control" /><br>
  <input type="submit" class="btn btn-primary btn-block mb-4">

 <?php if (isset($_SESSION['blad'])) echo $_SESSION['blad']; ?>

</form>

</body>
</html>