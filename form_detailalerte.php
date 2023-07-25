<?php 
//require_once('Database.php');
session_start();
require_once('Db.php');
$num_alerte=$_GET['numalerte'];



    //Collecter les données du formulaire

    try
    {
        //Connexion a la base de donnees
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
        $statment=$conn->prepare
        (
            "SELECT * FROM  alerte AS a
             LEFT JOIN province AS p ON a.pcodeprovince=p.pcodeprovince
             LEFT JOIN territoire AS t ON a.pcodeterritoire=t.pcodeterritoire
             LEFT JOIN chefferie AS c ON  a.pcodechefferie=c.pcodechefferie
             LEFT JOIN zonesante AS z ON a.pcodezonesante=z.pcodezonesante
             LEFT JOIN airesante AS r ON a.pcodeairesante=r.pcodeairesante             
             WHERE codealerte=?
             "
        );

        //Execution de la requete
        $statment->execute([$num_alerte]);
        //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";

        $alertes=$statment->fetch();
        if($alertes!=NULL)
        {
             
                //var_dump($alertes);
        }
        else
        {
            //echo 'Oups...............';
        }


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
                <h3 class="card-title">Détails de l'alerte</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
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



              
              
              <form action="action_updatealerte.php" method="POST">
               
              
              
              <h3 class="card-body">Informations générales</h3>
               
               
              <hr>
                <div class="card-body">
                

                <label>Numéro d'alerte:</label>
                                           
                                           <input type="text" class="form-control" name="codealerte" value=<?php echo $alertes['codealerte'] ?> readonly/>
                                           
                                   </div>
                   
                                     <div class="card-body">
                                     <label>Date de l'évenement:</label>
                                                             
                                           <input type="text" class="form-control" name="dateevenement" value=<?php echo $alertes['dateevenement'] ?> readonly/>
                                           
                                   </div>
                  
                                   <div class="card-body">
                                     <label>Date de rapportage:</label>
                                                             
                                           <input type="text" class="form-control" name="daterapportage" value=<?php echo $alertes['daterapportage'] ?> readonly/>
                                           
                                   </div>
                  
                                   <div class="card-body">
                                     <label>Alerte lancée par:</label>
                                                             
                                           <input type="text" class="form-control" name="lanceuralerte" value=<?php echo $alertes['lanceuralerte'] ?> readonly/>
                                           
                                   </div>
                  
                  
                                   <div class="card-body">
                                     <label>Type d'événement:</label>
                                                             
                                           <input type="text" class="form-control" name="typeevement" value=<?php echo $alertes['typeevement'] ?> readonly/>
                                           
                                   </div>
                   
                   
                  
                   
                                     <div class="card-body">
                                       <label >Description des faits</label>
                                       <textarea class="form-control" name="descriptionfaits" id="descriptionfaits" rows="6"  ><?php echo $alertes['descriptionfaits'] ?></textarea>
                                     </div>
                  
                                     <div class="card-body">
                                     <label>Impact:</label>
                                                             
                                           <input type="text" class="form-control" name="impact_alerte" value=<?php echo $alertes['impact_alerte'] ?> readonly/>
                                           
                                   </div>
                   
                  
                   
                                    <div class="card-body">
                                       <label >Recommandations</label>
                                       <textarea class="form-control" name="recommandations" id="recommandations" rows="6"><?php echo $alertes['recommandations'] ?></textarea>
                                     </div>
                   
                   
                                     <div class="card-body">
                                     <label>Force qui occupe la zone:</label>
                                                             
                                           <input type="text" class="form-control" name="occupantzone" value=<?php echo $alertes['occupantzone'] ?> readonly/>
                                           
                                   </div>
                   
                                   
                   
                                   <div class="card-body">
                                       <label >Position FRDC la plus proche</label>
                                       <input type="text" class="form-control" id="positinfrdcproche" name="positinfrdcproche" value=<?php echo $alertes['positinfrdcproche'] ?> />
                                   </div>
                   
                              
                                   <div class="card-body">
                                     <label>Source d'information:</label>
                                                             
                                           <input type="text" class="form-control" name="sourceinfo" value=<?php echo $alertes['sourceinfo'] ?> readonly/>
                                           
                                   </div>
                   
                                   <div class="card-body">
                                       <label >Détails source</label>
                                       <input type="text" class="form-control" id="detailsourceinfo" name="detailsourceinfo" value=<?php echo $alertes['detailsourceinfo'] ?> />
                                   </div>
                   
                                   <div class="card-body">
                                       <label >Téléphone après triangulation</label>
                                       <input type="text" class="form-control" id="telephoneverification" name="telephoneverification" >
                                   </div>
                   






                <h3 class="card-body">Localisation de l'alerte</h3>
                <hr>


                <div class="card-body">
                                      
                                       <label ><?php 
                                       
                                       echo "Province:".$alertes['nomprovince']."<br>"."Territoire:".$alertes['nomterritoire']."<br>"."Zone de santé:".$alertes['nomzonesante']."<br>"."Village:".$alertes['village']."<br>" 
                                       
                                       ?>
                                       </label>
                                       
                                   </div>



               

                <h3 class="card-body">Profil des victimes</h3>
                <hr>


             

                <div class="card-body">
                    <label >Victimes</label>
                    <input type="text" class="form-control" id="autre_victime" name="autre_victime" value=<?php echo $alertes['victimes'] ?> readonly>
                </div>



                <h3 class="card-body">Auteurs presumés</h3>
                <hr>

                <div class="card-body">
                    <label >Auteur</label>
                    <input type="text" class="form-control" id="auteurpresume" name="auteurpresume" value=<?php echo $alertes['auteurpresume'] ?> readonly>
                </div>




                

                



                <h3 class="card-body">Statistiques sur le mouvement de population</h3>
                <hr>
              






                   
                 <div class="card-body">
                    <label >Type de mouvement</label>
                    <select class="form-control" id="typemouvement" name="typemouvement">
                      
                        <option value="Pendulaire">Pendulaire</option>
                        <option value="Massif">Massif</option>
                        <option value="Preventif">Préventif</option>
                        <option value="Perle">Perle</option>
                        <option value="Autre">Autre</option>                       
                    </select>
                </div>

                 <div class="card-body">
                    <label >Localite/Village de provenance</label>
                    <input type="text" class="form-control" id="village_provenance" name="village_provenance" value=<?php echo $alertes['village_provenance'] ?> >
                </div>

                <div class="card-body">
                    <label >Localite/Village d'accueil</label>
                    <input type="text" class="form-control" id=" village_accueil" name=" village_accueil" value=<?php echo $alertes['village_accueil'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre total de ménages</label>
                    <input type="number" class="form-control" id=" nbre_menages" name=" nbre_menages" value=<?php echo $alertes['nbre_menages'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre total de personnes</label>
                    <input type="number" class="form-control" id=" nbre_personnes" name=" nbre_personnes" value=<?php echo $alertes['nbre_personnes'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre de femmes</label>
                    <input type="number" class="form-control" id=" nbre_femmes" name=" nbre_femmes" value=<?php echo $alertes['nbre_femmes'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre d'hommes</label>
                    <input type="number" class="form-control" id=" nbre_hommes" name=" nbre_hommes" value=<?php echo $alertes['nbre_hommes'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre de filles</label>
                    <input type="number" class="form-control" id=" nbre_filles" name=" nbre_filles" value=<?php echo $alertes['nbre_filles'] ?> >
                </div>

                <div class="card-body">
                    <label >Nombre de garçons</label>
                    <input type="number" class="form-control" id=" nbre_garcons" name=" nbre_garcons" value=<?php echo $alertes['nbre_garcons'] ?> >
                </div>
                 






                <h3 class="card-body">Informations complémentaires</h3>
                <hr>

                <div class="card-body">
                    <label >Type d'informations</label>
                    <select class="form-control"  id="type_infocomplementaire" name="type_infocomplementaire" style="width: 100%;">
                          <option value="Retour PDI">Mouvement de retour</option>  
                          <option value="Liberation otages">Libération des otages</option>  
                          <option value="Retrait assaillants">Retrait des assaillants</option> 
                          <option value="Autre">Autre</option>  
                                     
                    </select>
                </div>

                <div class="card-body">
                                       <label >Détails/informations complémentaires</label>
                                       <textarea class="form-control" name="infocomplementaire" id="infocomplementaire" rows="6"  ><?php echo $alertes['infocomplementaire'] ?></textarea>
                </div>

                <div class="card-body" hidden>
                    <label >Valider cette alerte?</label>
                    <select class="form-control"  id="valider" name="valider" style="width: 100%;">
                          <option value="Non">NON</option>  
                          <option value="Oui">OUI</option>  
                          
                                       
                    </select>
                </div>


                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="update" class="btn btn-primary">Mettre à jour</button>
                  <a href="form_createreponse.php?numalerte=<?php echo $alertes['codealerte'] ?>" method="get" class="btn btn-primary">Réponse</a>
                  
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

 