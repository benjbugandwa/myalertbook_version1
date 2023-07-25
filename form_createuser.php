<?php 
session_start();
require_once('Db.php');
//parametres de connexion à la base des données 
$servername = 'localhost';
$username = 'root';
$password = '';


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
                <h3 class="card-title">Nouvel utilisateur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="action_createuser.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label >E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                  </div>

                  <div class="form-group">
                    <label >Nom complet</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Noms">
                  </div>

                  <div class="form-group">
                    <label >Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                  </div>

                  <div class="form-group">
                    <label >Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirmer le mot de passe">
                  </div>

                  <div class="form-group">
                    <label >Profil</label>
                    <select class="form-control" id="user_role" name="user_role">                       
                        <option value="ADMINISTRATEUR">Administrateur</option>
                        <option value="MONITEUR">Moniteur</option>
                        <option value="SUPERVISEUR">Superviseur</option>
                        
                    </select>                    
                  </div>

                  <div class="form-group">
                    <label >Organisation</label>
                    <select class="form-control" id="organisation" name="organisation">                       
                    <option value="-">--Organisation--</option> 
                        
                        <!--Chargement de la liste des organisations-->
                        <?php  
                           foreach($lanceurs as $lanceur)  {
                       ?>  
                             <option value="<?php echo $lanceur['sigleorganisation'];?>"><?php echo $lanceur['denomination']; ?></option>
                       <?php } ?>                        
                    </select>                    
                  </div>

                  <div class="form-group">
                    <label >Province d'affectation</label>
                    <select class="form-control" id="province" name="province">                       
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
                    <label >N° de téléphone</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="Telephone">
                  </div>

                  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"   name="saveuser" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content --> 
  
  </div>


<?php include 'footer.php';?>