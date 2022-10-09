<?php 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();
if (!isset($_SESSION['is_logged'])){
    header('Location: ../../index.php');
    exit();
}

require_once "../../Controllers/Auth.php";
$auth = New Auth();
$user = $auth->get_user();

?>

<html>
<head>
  
  <title>Control Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
<?php   
echo '<div class="col-10 offset-1 mt-1 mb-1"><span>Welcome, <b>'.$user['name']."! | <a href='../../logout.php'>Logout</a></b></span></div>";
    ?>
    <div class="card text-center col-10 offset-1" style="padding:15px;">
  <h4>CONTROL PANEL</h4>
  
  <?php echo '<span><a href="../Articles/index.php">Lista articulow</a> | ';?>
  <?php echo '<span><a href="../Categories/v_category.php">Category</a> | ';?>
  <?php echo '<span><a href="../Auth/index.php">Users</a> | ';?>

 
</div><br> 
