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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center col-3 offset-4 mt-4" style="padding:15px;">

  <h5>You must logged to system!</h5>
  <pre><b>Login:</b> admin, <b>password:</b> 1</pre>

<form action = "login.php" method="post">
 
    <input type="text" name="login" id="form2Example1" class="form-control" /><br>
    <input type="password" name="haslo" id="form2Example2" class="form-control" /><br>
  <input type="submit" class="btn btn-primary btn-block mb-4">

 <?php if (isset($_SESSION['blad'])) echo $_SESSION['blad']; ?>

</form>

</div>

<script src="../../assets/jquery.min.js"></script>
<script src="../../assets/bootstrap.min.js"></script>

</body>
</html>