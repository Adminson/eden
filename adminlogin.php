<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>
 <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'admin';
                  
                  header('Location: index.php');
               }else if($_POST['username'] == 'staff' && $_POST['password'] == 'staff'){
				    $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'staff';
                  
                  header('Location: index.php');
			   }
               else 
               {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Workshop Service Center </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
      
      

<div class="container">
<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4">    
  <h2>Username and Password</h2> 
   <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <h4 class="form-signin-heading"><font color="red"><?php echo $msg; ?></font></h4>
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" name="username" placeholder="username" required autofocus>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" placeholder="password" required>
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
  </form></div>
  <div class="col-sm-4"></div>
</div>
</div>
   </body>
</html>