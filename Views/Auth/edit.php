<?php

   
    include_once '../../header.php';
    include_once '../../Controllers/Auth.php';
    

    $ob_auth = new Auth();
    
    
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $user = $ob_auth->displayRecordById($editId);
  }

  elseif(isset($_POST['update'])) {
    $ob_auth->updateRecord($_POST);
  }
  
  else {
      echo 'Error';
      exit();
  }

 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Editing article</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Editing User: <?php echo $user['name'];?></h4>
                </div>
                <div class="card-body bg-light">
                  <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label for="name">Username:</label>
                      <input type="text" class="form-control" name="name" 
                             value="<?php echo $user['name']; ?>" required="">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" name="email" 
                             value="<?php echo $user['email']; ?>" required="">
                    </div>
                    
                      <div class="form-group">
                      <label for="salary">Password:</label>
                      <input type="text" class="form-control" name="password" 
                             value="<?php echo $user['password']; ?>" required="">
                    </div>

                    <div class="form-group">
                      <label for="salary">Status:</label>
                      <?php 
                        if ($user['is_active'] = 1) {
                          echo ('<input type="checkbox" class="form-control" name="is_active" 
                          value="1" checked>');}
                        else {
                          echo ('<input type="checkbox" class="form-control" name="is_active" 
                             value="0">');
                        }  
                      
                      ?>
                      
                    </div>

                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                      <input type="submit" name="update" class="btn btn-primary" 
                             style="float:right;" value="Update">
                    </div>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once '../../footer.php'; ?>
</body>
</html>