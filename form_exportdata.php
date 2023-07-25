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
  <title>Exporter les données</title>

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
                <h3 class="card-title">Exporter les données</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action_exportdata.php" method="POST">
               
              <div class="row">
              <div class="col-sm-6">
              <div class="form-group">
                  <label>A partir de:</label>
                    <div class="input-group date" id="dateevenement" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="dateevenement" data-target="#dateevenement"/>
                        <div class="input-group-append" data-target="#dateevenement" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label>Jusqu'au:</label>
                    <div class="input-group date" id="daterapportage" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="daterapportage" data-target="#daterapportage"/>
                        <div class="input-group-append" data-target="#daterapportage" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
              </div>

              <div class="form-group">
              <label >Format</label>
                    <select class="form-control" id="file_ext" name="file_ext">
                     
                        <option value="csv">CSV</option>
                        <option value="xlsx">EXCEL</option>
                       
                </select>
              </div>

              
              <div class="card-footer">
                  <button type="submit"  name="export_excel_btn" class="btn btn-primary">Exporter</button>
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
