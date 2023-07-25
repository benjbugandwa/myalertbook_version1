<?php 
//require_once('Database.php');
session_start();
require_once('Db.php');
if($_SESSION['user_role']=="ADMINISTRATEUR")
{
    


    try
    {
        //Connexion a la base de donnees
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
        $statment=$conn->prepare
        (
            "SELECT * FROM organisation  ORDER BY sigleorganisation"           
            
            
             
        );

        //Execution de la requete
        $statment->execute();

        $organisations=$statment->fetchAll();

        //if($alertes!=NULL)


        //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
    }
    catch(Exception $e){
        return $e->getMessage();
    }

    
   
}
else
{
  $_SESSION['error_message']="Vous n etes pas autorisé à effectuer cette action: ";
  header('location:form_login.php');
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
          

            <a href="form_createorganisation.php" class="btn btn-sm btn-primary">
                      <i class="fas fa fa-plus-circle"></i> ajouter
            </a>




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




          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
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
      <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Liste des organisations</h3>
              </div>
              <!-- /.card-header -->
              <!-- table start -->
              
              
              <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search" hidden>

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default" hidden>
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              


                 




                




                <table class="table table-hover text-nowrap" id="table_listalertes">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>SIGLE</th>
                      <th>DENOMINATION</th>
                      <th>CATEGORIE</th>
                      <th>SECTEUR</th>
                
                    </tr>
                  </thead>
                  <tbody>


                  <?php
                  
                  if($organisations!=NULL)
                  {
                    foreach($organisations as $org)
                    {
                      
                      ?>
                      
                      <tr>
                          <td><a href="form_detailalerte.php?numalerte=<?php echo $org['idorganisation'] ?>" method="get" class="nav-link active"><b><?php echo $org['idorganisation'] ?></b></a></td>
                          <td><?php echo $org['sigleorganisation'] ?></td>
                          <td><?php echo $org['denomination'] ?></td>
                          <td><?php echo $org['categorieorganisation'] ?></td>
                          <td><?php echo $org['secteuractivite'] ?></td>
                          
                      </tr>
                  
                  <?php 
                    }

                }
                else
                 {
                ?>

                    <tr>
                        <td colspan="9"> Aucune alerte trouvée</td>
                    </tr>


                  <?php 
                  }
                  ?>

                
                                      
                  </tbody>
                </table>


                






              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>















              
              
            




            </div>  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content --> 
  
  </div>


<?php include 'footer.php';?>