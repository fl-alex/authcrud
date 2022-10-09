<?php

  session_start();
  if (!isset($_SESSION['is_logged'])){
      header('Location: login.php');
  }

  
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
  <h2>Users list
    <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
        <?php 
          $users = $ob_auth->display_rec();
          if (is_array($users)){
              
          
          foreach ($users as $user) {
        ?>
        <tr>
          <td><?php echo $user['id'] ?></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
          <td><?php echo $user['password'] ?></td>
          <td><?php echo $user['is_active'] ?></td>
          <td>
            <button class="btn btn-primary mr-2"><a href="edit.php?editId=<?php echo $user['id'] ?>">
              <i class="fa fa-pencil text-white" aria-hidden="true"></i></a></button>
            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $user['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            </a></button>
          </td>
        </tr>
      <?php }
          }
 else {             
              
 }
          ?>
    </tbody>
  </table>
</div>
<?php include_once '../../footer.php';?>

</body>
</html>
