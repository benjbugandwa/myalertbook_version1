<?php 
//require_once('Database.php');
session_start();
require_once('Db.php');

if(isset($_SESSION['provinceuser']))
{
    


    //Collecter les données du formulaire
    $pcodeprovince_user=$_SESSION['provinceuser'];
 


    try
    {
        //Connexion a la base de donnees
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete
        $numperpage=5;
       // $coutsql=$statmtcount

        

        $statmtcount=$conn->prepare("SELECT COUNT(idalerte) FROM alerte WHERE pcodeprovince=?");
        $statmtcount->execute([$pcodeprovince_user]);
        $row=$statmtcount->fetch();
        $numrecords=$row[0];

        $numlinks=ceil($numrecords/$numperpage);
        $page=$_GET['start'];
        if(!$page) $page=0;
        $start=$page*$numperpage;


        $statment=$conn->prepare
        (
            "SELECT * FROM alerte             
            WHERE pcodeprovince=?   ORDER BY idalerte DESC LIMIT $start,$numperpage"
                         
        );

        //Execution de la requete
        $statment->execute([$pcodeprovince_user]);

        $alertes=$statment->fetchAll();

        
        if(isset($_SESSION['code_alerte']))
        {
            unset($_SESSION['code_alerte']);
        }
        //if($alertes!=NULL)


        //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
    }
    catch(Exception $e){
        return $e->getMessage();
    }

    
   
}
else
{
    echo "IS NOT SET";
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
            <a href="form_newalerte.php" class="btn btn-sm btn-primary">
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
                <h3 class="card-title">Liste des alertes (<?php echo $row[0]?>)</h3>
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
              <div class="card-body">
                   
                    <input type="text" class="form-control" id="search" name="search" placeholder="Rechercher..." onkeyup="search_data()">
                    
                  </div>


                 




                




                <table class="table table-hover text-nowrap" id="table_listalertes">
                  <thead>
                    <tr>
                      <th>N° Alerte</th>
                      <th>Evenement</th>
                      <th>Date de survenance</th>
                      <th>Localité touchée</th>
                      <th>Axe</th>                     
                      <th>Auteur présumé</th>
                      <th>Lanceur d'alerte</th>
                      <th>Alerte validée</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>


                  <?php
                  
                  if($alertes!=NULL)
                  {
                    foreach($alertes as $alerte)
                    {
                      $numalerte=$alerte['codealerte']
                      ?>
                      
                      <tr>
                          <td><a href="form_detailalerte.php?numalerte=<?php echo $alerte['codealerte'] ?>" method="get" class="nav-link active"><b><?php echo $alerte['codealerte'] ?></b></a></td>
                          <td><?php echo $alerte['typeevement'] ?></td>
                          <td><?php echo $alerte['dateevenement'] ?></td>
                          <td><?php echo $alerte['village'] ?></td>
                          <td><?php echo $alerte['axealerte'] ?></td>                         
                          <td><?php echo $alerte['auteurpresume'] ?></td>
                          <td><?php echo $alerte['lanceuralerte'] ?></td>
                          <td><?php echo $alerte['is_alerte_validee'] ?></td>

                          <?php
                              if($alerte['is_alerte_validee']=="Oui")
                              {
                          ?>
                               <td><i class="fa fa-check" aria-hidden="true"></i></td>
                          <?php
                              }
                                else 
                                {
                            ?>                          
                                <td><a href="form_valideralerte.php?numalerte=<?php echo $alerte['codealerte'] ?>" method="get" class="nav-link active"><b>Valider</b></a></td>
                          <?php 
                                }
                          ?>
                      
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

                <ul class="pagination pagination-sm m-0 float-right">
                  <?php 
                      for($i=0;$i<$numlinks;$i++)
                      { $y=$i+1;
                  ?>
                                           
                      <li class="page-item"><a class="page-link" href="form_listalertes.php?start=<?php echo $i ?>" method="get" ><?php echo $y ?></a></li>
                     
                  <?php 
                         //echo '<a href="form_listalertes.php?start= '.$i.'">'.$i.'</a>';  //$i.' ';
                      }
                  ?>
                 </ul>






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