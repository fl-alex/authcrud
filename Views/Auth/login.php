<?php


  include_once "../../Controllers/Auth.php";
  $ob_auth = new Auth();

  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $ob_auth->deleteRecord($deleteId);
  }
  include_once '../../header.php';
  
?>

<div class="container">
  
  <?php
    if (isset($_GET['msg'])){
        $msg = stripcslashes($_GET['msg']);
        
        switch ($msg) {
            case 'insert':
                echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Added ok!
            </div>";
                break;
            case 'update':
                echo "<div class='alert alert-warning alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Updated ok!
            </div>";
                break;
            case 'delete':
                echo "<div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Deleted ok!
            </div>";
                break;

            default:
                break;
        }
        
    }  
   
  ?>
  <h2>Login form
    <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>

    <form name="form-login" method="post" action="">
      <input type="text" name="login" /><br>
      <input type="password" name="password" /><br>
      <input type="submit" />
    </form>
  
        <?php 
          $users = $ob_auth->display_rec();
          if (is_array($users)){}
          foreach ($users as $user) {
          } ?>
</div>
<?php include_once '../../footer.php';?>

</body>
</html>
