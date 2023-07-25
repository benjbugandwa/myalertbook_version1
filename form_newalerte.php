<?php
require_once('Db.php');




try
{
    //Connexion a la base de donnees
    //$conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
    $conn=getconnexion();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Preparer la requete-insert
    $statment_provinces=$conn->prepare("SELECT * FROM province");
    $statment_lanceurs=$conn->prepare("SELECT * FROM organisation");
    $statment_violations=$conn->prepare("SELECT * FROM violation ORDER BY Denomination");
   
    //Execution de la requete
    $statment_provinces->execute();
    $statment_lanceurs->execute();
    $statment_violations->execute();


    //Recuperation des resultats de la requete
    $provinces=$statment_provinces->fetchAll();
    $lanceurs=$statment_lanceurs->fetchAll();
    $violations=$statment_violations->fetchAll();

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nouvelle alerte</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/form_home.php" class="nav-link">Accueil</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>



    





     



      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  


<?php include('sidebarmenu.php');?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
      <!-- SELECT2 EXAMPLE MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM-->
      
      
      
      
      
      
      
      
      
      <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Nouvelle alerte l'alerte</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action_createalerte.php" method="POST">
               
              
              
              <h3>Informations générales</h3>
               
               
              <hr>
                <div class="card-body">
                

                  <div class="form-group">
                  <label>Date de l'évenement:</label>
                    <div class="input-group date" id="dateevenement" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="dateevenement" data-target="#dateevenement"/>
                        <div class="input-group-append" data-target="#dateevenement" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                  <label>Date de rapportage:</label>
                    <div class="input-group date" id="daterapportage" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="daterapportage" data-target="#daterapportage"/>
                        <div class="input-group-append" data-target="#daterapportage" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>



                 


                  <div class="form-group">
                    <label >Lanceur d'alerte</label>
                    <select class="form-control" id="lanceur" name="lanceur">
                        <option value="-">--Organisation--</option> 
                        
                         <!--Chargement de la liste des provinces-->
                         <?php  
                            foreach($lanceurs as $lanceur)  {
                        ?>  
                              <option value="<?php echo $lanceur['sigleorganisation'];?>"><?php echo $lanceur['denomination']; ?></option>
                        <?php } ?> 
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Type d'évenement</label>
                    <select class="form-control" id="typeevement" name="typeevement">
                        <option value="-">--Evenement--</option>
                        <option value="Attaques et affrontements armes">Attaques suivi d'affrontements armés</option>
                        <option value="Incursion ou attaque directe contre des civils">Incursion ou attaque directe contre des civils</option>
                        <option value="Crépitement des balles">Crépitement des balles</option>
                        <option value="Embuscade ou braquage sur la route">Embuscade ou braquage sur la route</option>
                        <option value="Conflit Intercommunautaire">Conflit Intercommunautaire</option>
                        <option value="Conflits fonciers">Conflits fonciers</option>
                        <option value="Conflit dans le pays limitrophe">Conflit dans le pays limitrophe</option>
                        <option value="Lutte de pouvoir coutumier">Lutte de pouvoir coutumier</option>
                        <option value="Conflits de controle des carrés miniers">Conflits de controle des carrés miniers</option>
                        <option value="Tensions politiques">Tensions politiques</option>
                        <option value="Conflits agro-pastorale ou de transhumance">Conflits agro-pastorale ou de transhumance</option>
                        <option value="Inondations">Inondations</option>
                        <option value="Pluies torrentielles">Pluies torrentielles</option>
                        <option value="Tremblement de terre">Tremblement de terre</option>
                        <option value="Glissement de terrain ou Eboulement">Glissement de terrain ou Eboulement</option>
                        <option value="Mouvement des militaires">Mouvement des militaires</option>
                        <option value="Autre">Autre</option>                    
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Description des faits</label>
                    <textarea class="form-control" name="descriptionfaits" id="descriptionfaits" rows="3" placeholder="Tapez ici ..."></textarea>
                  </div>

               


                 <div class="form-group">
                    <label >Evenement similaire dans la zone ?</label>
                    <select class="form-control"  id="evenementsimilaire" name="evenementsimilaire" style="width: 100%;">
                          <option value="-">--Sélectionnez--</option> 
                          <option value="Oui">OUI</option>  
                          <option value="Non">NON</option>  
                                       
                    </select>
                </div>






                 <div class="form-group">
                  <label id="lbldateventsim">Date de dernier événement similaire:</label>
                    <div class="input-group date" id="dateevenementsimilaire" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="dateevenementsimilaire" data-target="#dateevenementsimilaire"/>
                        <div class="input-group-append" data-target="#dateevenementsimilaire" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                 <!--<div class="form-group">
                    <label >Impact sur la population</label>
                    <select class="form-control" id="impact_alerte" name="impact_alerte">
                        <option value="-">--impact--</option>
                        <option value="AUGMENTATION DES PRIX">AUGMENTATION DES PRIX</option>
                        <option value="EPIDEMIES">EPIDEMIES</option> 
                        <option value="LIMITATION DES MOUVEMENTS">LIMITATION DES MOUVEMENTS</option> 
                        <option value="MALNUTRITION">MALNUTRITION</option> 
                        <option value="PERTE DACCES AUX SERVICES ET AUX BIENS">PERTE D'ACCES AUX SERVICES ET AUX BIENS</option> 
                        <option value="PERTE DE LOGEMENT">PERTE DE LOGEMENT</option>
                        <option value="AUTRE">AUTRE</option>                        
                    </select>
                </div>-->


                <div class="form-group">
                    <label >Impact de l'alerte</label>
                    <select class="select2" multiple="multiple" id="impact_alerte" name="impact_alerte[]" style="width: 100%;">
                       
                    <option value="-">--impact--</option>
                        <option value="AUGMENTATION DES PRIX">AUGMENTATION DES PRIX</option>
                        <option value="EPIDEMIES">EPIDEMIES</option> 
                        <option value="LIMITATION DES MOUVEMENTS">LIMITATION DES MOUVEMENTS</option> 
                        <option value="MALNUTRITION">MALNUTRITION</option> 
                        <option value="PERTE DACCES AUX SERVICES ET AUX BIENS">PERTE D'ACCES AUX SERVICES ET AUX BIENS</option> 
                        <option value="PERTE DE LOGEMENT">PERTE DE LOGEMENT</option>
                        <option value="MOUVEMENT DE POPULATION">MOUVEMENT DE POPULATION</option>
                        <option value="PROBLEMATIQUE DE PROTECTION">PROBLEMATIQUE DE PROTECTION</option>
                        <option value="AUTRE">AUTRE</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Autres impacts à preciser</label>
                    <input type="text" class="form-control" id="autre_impact" name="autre_impact" >
                </div>








                 <div class="form-group">
                    <label >Recommandations</label>
                    <textarea class="form-control" name="recommandations" id="recommandations" rows="3" placeholder="Tapez ici ..."></textarea>
                  </div>


                

                <div class="form-group">
                    <label >Zone occupée par</label>
                    <select class="form-control" id="occupant" name="occupant">
                        <option value="-">--Occupant--</option> 
                        <option value="FRDC">FRDC</option> 
                        <option value="PNC">PNC</option>  
                        <option value="MILICIENS">MILICIENS</option> 
                        <option value="AUTRE">AUTRE</option>                    
                    </select>
                </div>

                <div class="form-group">
                    <label >Position FRDC la plus proche</label>
                    <input type="text" class="form-control" id="positinfrdcproche" name="positinfrdcproche" >
                </div>

                <div class="form-group">
                    <label >Source d'information</label>
                    <select class="form-control" id="sourceinfo" name="sourceinfo">
                        <option value="-">--Source--</option> 
                        <option value="AUTHORITEs">AUTORITES</option>
                        <option value="HUMANITAIRES">HUMANITAIRES</option>  
                        <option value="SOCIETE CIVILE">SOCIETE CIVILE</option> 
                        <option value="AUTRE">AUTRE</option>                   
                    </select>
                </div>

                <div class="form-group">
                    <label >Détails source</label>
                    <input type="text" class="form-control" id="detailsourceinfo" name="detailsourceinfo" >
                </div>

                <div class="form-group">
                    <label >Téléphone pour triangulation</label>
                    <input type="text" class="form-control" id="telephoneverification" name="telephoneverification" >
                </div>


                <div class="form-group">
                    <label >Autres commentaires sur l'alerte</label>
                    <textarea class="form-control" name="commentaires" id="commentaires" rows="3" placeholder="Tapez ici ..."></textarea>
                  </div>




                <h3>Localisation de l'alerte</h3>
                <hr>

                <div class="form-group">
                    <label >Province</label>
                    <select class="form-control" id="pcodeprovince" name="pcodeprovince" onchange="FetchTerritoires(this.value)">
                        <option value="-">--Province--</option> 
                        <!--Chargement de la liste des provinces-->
                        <?php  
                            foreach($provinces as $province)  {
                        ?>  
                              <option value="<?php echo $province['pcodeprovince'];?>"><?php echo $province['nomprovince']; ?></option>
                        <?php } ?> 
                       
                                             
                    </select>
                </div>
                <div class="form-group">
                    <label >Territoire</label>
                    <select class="form-control" id="pcodeterritoire" name="pcodeterritoire" onchange="FetchChefferies(this.value)">
                        <option value="-">--Territoire--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Chefferie</label>
                    <select class="form-control" id="pcodechefferie" name="pcodechefferie" onchange="FetchGroupements(this.value)">
                        <option value="-">--Chefferie--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Groupement</label>
                    <select class="form-control" id="pcodegroupement" name="pcodegroupement">
                        <option value="-">--Groupement--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Zone de santé</label>
                    <select class="form-control" id="pcodezonesante" name="pcodezonesante" onchange="FetchAiresSante(this.value)">
                        <option value="-">--Zone de santé--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Aire de santé</label>
                    <select class="form-control" id="pcodeairesante" name="pcodeairesante">
                        <option value="-">--Aire de santé--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Village/Localité</label>
                    <input type="text" class="form-control" id="village" name="village" >
                </div>

                <div class="form-group">
                    <label >Axe</label>
                    <input type="text" class="form-control" id="axealerte" name="axealerte" >
                </div>

                <h3>Profil des victimes</h3>
                <hr>


                <div class="form-group">
                    <label >Victimes</label>
                    <select class="select2" multiple="multiple" id="victimes" name="victimes[]" style="width: 100%;">
                       
                        
                              <option value="-">--Victime--</option>
                              <option value="Residents">Résidents</option>
                              <option value="PDI">Déplacés</option>
                              <option value="Retournes">Retournés</option>
                              <option value="Refugies">Refugiés</option>
                              <option value="Rapatrie">Rapatriés</option>
                                        
                    </select>
                </div>

                <div class="form-group">
                    <label >Autres victimes</label>
                    <input type="text" class="form-control" id="autre_victime" name="autre_victime">
                </div>



            

                <h3>Auteurs presumés</h3>
                <hr>

                <div class="form-group">
                    <label >Principal auteur présumé</label>
                    <select class="form-control" id="auteurpresume" name="auteurpresume">
                        <option value="-">--Auteur--</option> 
                        <option value="FRDC">FRDC</option>
                        <option value="PNC">PNC</option>
                        <option value="GROUPE ARME">GROUPE ARME</option>
                        <option value="MILICIENS">MILICIENS</option>
                        <option value="Population civile">POPULATION CIVILE</option> 
                        <option value="AUCUN">AUCUN</option>                     
                    </select>
                </div>

                <div class="form-group">
                    <label >Autres détails sur l'auteurs</label>
                    <input type="text" class="form-control" id="autre_auteur" name="autre_auteur" >
                </div>


                

                



                <h3>Mouvement de population</h3>
                <hr>


                <div class="form-group">
                    <label >L'événement a-t-il déclenché un mouvement de population ?</label>
                    <select class="form-control"  id="mouvement_population" name="mouvement_population" style="width: 100%;" onchange="EnableDisableMvt()">
                         
                          <option value="Non">NON</option> 
                          <option value="Oui">OUI</option>  
                                       
                    </select>
                </div>


                

                 <div id="mouvementpopulation">   
                 <div class="form-group">
                    <label >Type de mouvement</label>
                    <select class="form-control" id="typemouvement" name="typemouvement">
                        <option value="-">--Type--</option>
                        <option value="Pendulaire">Pendulaire</option>
                        <option value="Massif">Massif</option>
                        <option value="Preventif">Préventif</option>
                        <option value="Perle">Perle</option>
                        <option value="Autre">Autre</option>                       
                    </select>
                </div>

                 <div class="form-group">
                    <label >Localite/Village de provenance</label>
                    <input type="text" class="form-control" id="village_provenance" name="village_provenance" >
                </div>

                <div class="form-group">
                    <label >Localite/Village d'accueil</label>
                    <input type="text" class="form-control" id=" village_accueil" name=" village_accueil" >
                </div>

                <div class="form-group">
                    <label >Nombre total de ménages</label>
                    <input type="number" class="form-control" id=" nbre_menages" name=" nbre_menages" value="0" >
                </div>

                <div class="form-group">
                    <label >Nombre total de personnes</label>
                    <input type="number" class="form-control" id=" nbre_personnes" name=" nbre_personnes" value="0" >
                </div>

                <div class="form-group">
                    <label >Nombre de femmes</label>
                    <input type="number" class="form-control" id=" nbre_femmes" name=" nbre_femmes" value="0" >
                </div>

                <div class="form-group">
                    <label >Nombre d'hommes</label>
                    <input type="number" class="form-control" id=" nbre_hommes" name=" nbre_hommes" value="0" >
                </div>

                <div class="form-group">
                    <label >Nombre de filles</label>
                    <input type="number" class="form-control" id=" nbre_filles" name=" nbre_filles" value="0" >
                </div>

                <div class="form-group">
                    <label >Nombre de garçons</label>
                    <input type="number" class="form-control" id=" nbre_garcons" name=" nbre_garcons" value="0" >
                </div>
                 </div>

                <h3>Violations enregistrées</h3>
                <hr>

                <div class="form-group">
                    <label >Violations commises</label>
                    <select class="select2" multiple="multiple" id="violations" name="violations[]" style="width: 100%;">
                       
                         <!--Chargement de la liste des provinces-->
                         <?php  
                            foreach($violations as $violation)  {
                        ?>  
                              <option value="<?php echo $violation['Denomination'];?>"><?php echo $violation['Denomination']; ?></option>
                        <?php } ?>                       
                    </select>
                </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="save" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div> 

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>AlertBook 2023 <a href="https://unhcr:org">Cluster protection</a>.</strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/mycustomscripts.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

<script>
$(document).ready(function(){
  $("#mouvementpopulation").find("input,select").prop("disabled",true);

  
  $('#dateevenementsimilaire').hide();
  
  $('#evenementsimilaire').change(function(){
    if($(this).val() === 'Oui'){
      $('#lbldateventsim').show();
      $('#dateevenementsimilaire').show();
    } else {
      $('#dateevenementsimilaire').hide();
      $('#lbldateventsim').hide();
    }
  });


  $('#mouvement_population').change(function(){
    if($(this).val() === 'Oui'){
      $("#mouvementpopulation").find("input,select").prop("disabled",false);
    } else {
      $("#mouvementpopulation").find("input,select").prop("disabled",true);
    }
  });



});




</script>






<script>
  function FetchTerritoires(id){
    $("#pcodeterritoire").html('');
    $.ajax({
      type:'post',
      url:'action_loadterritoiresbyprovince.php',
      data:{pcodeprovince:id},
      success:function(data){
        $("#pcodeterritoire").html(data);
      }
    })
  }

  function FetchChefferies(id){
    $("#pcodechefferie").html('');
    $.ajax({
      type:'post',
      url:'action_loadchefferiebyterritoire.php',
      data:{pcodeterritoire:id},
      success:function(data){
        $("#pcodechefferie").html(data);
      }
    })

    //Charger les zones de sante
    $.ajax({
      type:'post',
      url:'action_loadzonesantebyterritoire.php',
      data:{pcodeterritoire:id},
      success:function(data){
        $("#pcodezonesante").html(data);
      }
    })
  }

  function FetchGroupements(id){
    $("#pcodegroupement").html('');
    $.ajax({
      type:'post',
      url:'action_loadgroupementsbychefferie.php',
      data:{pcodechefferie:id},
      success:function(data){
        $("#pcodegroupement").html(data);
      }
    })

    
  }

  function FetchAiresSante(id){
    $("#pcodeairesante").html('');
    $.ajax({
      type:'post',
      url:'action_loadairesantebyzone.php',
      data:{pcodezonesante:id},
      success:function(data){
        $("#pcodeairesante").html(data);
      }
    })
  }

  function EnableDisableMvt() {


    $('#mouvement_population').change(function () {
        if ($(this).val() == 'Oui') {
           
            $("#mouvementpopulation").find("input,select").prop("disabled",false);
        }
        else if ($(this).val() == 'Non') {
          
            $("#mouvementpopulation").find("input,select").prop("disabled",true);
        }
    });
   
}

function validateTerms(){
var evsim=document.getElementById('evenementsimilaire');
var mouvp=document.getElementById('mouvement_population');
var result='';
if (c.checked) {
result='Oui';
return result;
} else {
result='Nom';
return result;
}
}
</script>
</body>
</html>
