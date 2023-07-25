<?php 
session_start();
require_once('Db.php');


$alertecode=$_GET['numalerte'];

try
{
    //Connexion a la base de donnees
    $conn =getconnexion(); //Cette methode est definie dans Db.php;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Preparer la requete-insert
    $statment_provinces=$conn->prepare("SELECT * FROM province");
    $statment_lanceurs=$conn->prepare("SELECT * FROM organisation");
    
    //Execution de la requete
    $statment_provinces->execute();
    $statment_lanceurs->execute();
    


    //Recuperation des resultats de la requete
    $provinces=$statment_provinces->fetchAll();
    $lanceurs=$statment_lanceurs->fetchAll();
    

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
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
                <h3 class="card-title">Nouvelle réponse</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="action_createreponse.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >N° alerte</label>
                    <input type="email" class="form-control" id="alertecode" name="alertecode" value=<?php echo $alertecode ?> readonly >
                  </div>

                  <div class="form-group" hidden>
                  <label>Date de l'intervention :</label>
                    <div class="input-group date" id="date_reponse" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="date_reponse" data-target="#date_reponse"/>
                        <div class="input-group-append" data-target="#date_reponse" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label >Intervenant</label>
                    <select class="form-control" id="organisation" name="organisation">                       
                    <option value="-">--Intervenant--</option> 
                        
                        <!--Chargement de la liste des organisations-->
                        <?php  
                           foreach($lanceurs as $lanceur)  {
                       ?>  
                             <option value="<?php echo $lanceur['sigleorganisation'];?>"><?php echo $lanceur['denomination']; ?></option>
                       <?php } ?>                        
                    </select>                    
                  </div>

                  
            
                <div class="form-group">
                    <label >Autre intervenant</label>
                    <input type="text" class="form-control" id="organisation_autre" name="organisation_autre" >
                  </div>


                  <div class="form-group">
                    <label >Type de réponse</label>
                    <select class="form-control" id="type_reponse" name="type_reponse">                       
                        <option value="HUMANITAIRE">Humanitaire</option>
                        <option value="MILITAIRE">Militaire</option>
                        <option value="AUTRE">Autre</option>
                        
                    </select>                    
                  </div>

                  <div class="form-group">
                    <label >Secteurs couverts</label>
                    <select class="form-control" id="secteurs_couverts" name="secteurs_couverts">                       
                        <option value="ABRIS">Abris/AME</option>
                        <option value="EDUCATION">Education</option>
                        <option value="SANTE">Santé</option>
                        <option value="SACAL">Sécurité alimentaire</option>
                        <option value="WASH">WASH</option>
                        <option value="PROTECTION">Protection</option>
                        <option value="SECURITE">Sécuritré/Protection civile</option>
                        
                    </select>                    
                  </div>

                  <div class="form-group">
                    <label >Autres secteurs</label>
                    <input type="text" class="form-control" id="secteur_autre" name="secteur_autre" >
                  </div>

                  <div class="form-group">
                    <label >Modalité de l'intervention</label>
                    <select class="form-control" id="modalite_intervention" name="modalite_intervention">                       
                        <option value="CASH">CASH</option>
                        <option value="NATURE">En nature</option>
                        <option value="M_MONEY">Transfert</option>
                        <option value="AUTRE">Autre</option>
                        
                    </select>                    
                  </div>

                  <div class="form-group">
                    <label >Nombre de ménages couverts</label>
                    <input type="number" class="form-control" id="nbre_beneficiares_menages" name="nbre_beneficiares_menages" >
                  </div>

                  <div class="form-group">
                    <label >Nombre d'individus couverts</label>
                    <input type="number" class="form-control" id="nbre_beneficiaires_individus" name="nbre_beneficiaires_individus">
                  </div>

                  <div class="form-group">
                    <label >Lieu de l'intervention(Territoire/Localité)</label>
                    <input type="text" class="form-control" id="lieu_intervention_localite" name="lieu_intervention_localite" >
                  </div>

                  <div class="form-group">
                    <label >Source de financement</label>
                    <input type="text" class="form-control" id="source_financement" name="source_financement" >
                  </div>

                  <div class="form-group">
                    <label >Détails de l'intervention</label>
                    
                    <textarea class="form-control" name="detail_intervention" id="detail_intervention" rows="6"  ></textarea>
                  </div>

                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   name="savereponse" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content --> 
  
  </div>


<?php include 'footer.php';?>