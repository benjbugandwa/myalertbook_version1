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
            <h1 class="m-0">Administration</h1>
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
                <h3 class="card-title">Nouvelle organisation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action_createorganisation.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >Sigle</label>
                    <input type="text" class="form-control" id="sigle" name="sigle" placeholder="sigle">
                  </div>
                  <div class="form-group">
                    <label >Dénomination</label>
                    <input type="text" class="form-control" id="denomination" name="denomination" placeholder="Denomination">
                  </div>

                  <div class="form-group">
                    <label >Categorie</label>
                    <select class="form-control" id="categorie" name="categorie">
                        <option value="-">--Catégorie--</option>
                        <option value="Nations Unies">Nations Unies</option>
                        <option value="ONG Internationale">ONG Internationale</option>
                        <option value="ONG Nationale">ONG Nationale</option>
                        <option value="Gouvernement">Gouvernement</option>
                        <option value="Autre">Aute</option>
                    </select>
                    
                  </div>

                  <div class="form-group">
                    <label >Secteur d'activité</label>
                    <input type="text" class="form-control" id="secteuractivite" name="secteuractivite" placeholder="Secteur">
                  </div>
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="save" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>



            </div>  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content --> 
  
  </div>


<?php include 'footer.php';?>