<?php
session_start();
if(isset($_SESSION['message']))
{?>
    
    <div class="alert alert-success" role="alert">
    <strong>Succès!</strong><?php echo $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

   
<?php
    //unset($_SESSION['message']);
}
?>

<?php include 'header.php';?>
<?php include 'navbar.php';?>
<?php include 'sidebarmenu.php';?>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>-->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page non trouvée.</h3>

          <p>
            Nous n'avons pas pu trouver la page que vous recherchez.
            Vous pouvez retourner à l'accueil <a href="form_home.php">retour</a>
          </p>

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

         
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content --> 
  
  </div>


<?php include 'footer.php';?>