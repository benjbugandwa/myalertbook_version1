<?php 
session_start();

if(isset($_SESSION['success_message']))
  unset($_SESSION['success_message']);

  //if(isset($_SESSION['error_message']))
  //unset($_SESSION['error_message']);

  if(isset($_SESSION['code_alerte']))
    unset($_SESSION['code_alerte']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>AlertBook</b></a>
  </div>
  <!-- /.login-logo -->
  
  
  <span>

<?php
if(isset($_SESSION['error_message']))
{?>
    
   


    <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?php echo $_SESSION['error_message']; ?>
                </div>

   
<?php
    unset($_SESSION['error_message']);
}
?>


<?php
if(isset($_SESSION['success_message']))
{?>
    
    

    

    <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  <?php echo $_SESSION['success_message']; ?>
                </div>

   
<?php
    unset($_SESSION['success_message']);
}
?>


  </span>
  
  
  
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Connectez-vous pour commencer</p>



  




      <form action="action_login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="useremail" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="userpassword" class="form-control" placeholder="Mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!--<input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>-->
            </div>
          </div>
          <!-- /.col -->
          <div class="social-auth-links text-center mb-3">
            <button type="submit" name="loginbtn" class="btn btn-block btn-primary">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
       
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="form_resetpassword.php">Mot de passe oublié?</a>
      </p>
      <p class="mb-0">
        
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
