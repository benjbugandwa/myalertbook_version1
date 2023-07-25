<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<?php
//session_start();
if(isset($_SESSION['message']))
{?>
    
    <div class="alert alert-success" role="alert">
    <strong>Succès!</strong><?php echo $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div

   
<?php
    unset($_SESSION['message']);
}
?>