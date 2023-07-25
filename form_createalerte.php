<?php include 'header.php';?>
<?php include 'navbar.php';?>
<?php include 'sidebarmenu.php';?>

<?php
require_once('Db.php');
//parametres de connexion à la base des données 
$servername = 'localhost';
$username = 'root';
$password = '';


try
{
    //Connexion a la base de donnees
    $conn = getconnexion();
   // $conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
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
                <h3 class="card-title">Nouvelle alerte</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="action_createorganisation.php" method="POST">
               <h3>Informations générales</h3>
               
               
              <hr>
                <div class="card-body">
                  <div class="form-group">
                    <label >N° de l'alerte</label>
                    <input type="text" class="form-control" id="codealerte" name="codealerte" >
                  </div>

                  <div class="form-group">
                  <label>Date Evenement:</label>
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
                    <select class="form-control" id="categorie" name="categorie">
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
                    </select>
                  </div>

                  <div class="form-group">
                    <label >Description des faits</label>
                    <textarea class="form-control" name="descriptionfaits" id="descriptionfaits" rows="3" placeholder="Tapez ici ..."></textarea>
                  </div>

                  <div class="form-check">
                          <input name="descriptionfaits" id="descriptionfaits" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Evenement similaire dans la zone ?</label>
                 </div>

                 <div class="form-group">
                  <label>Date de dernier événement similaire:</label>
                    <div class="input-group date" id="dateevenementsimilaire" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="dateevenementsimilaire" data-target="#dateevenementsimilaire"/>
                        <div class="input-group-append" data-target="#dateevenementsimilaire" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                 <div class="form-group">
                    <label >Impact sur la population</label>
                    <select class="form-control" id="impact_alerte" name="impact_alerte">
                        <option value="-">--impact--</option>                       
                    </select>
                </div>

                 <div class="form-group">
                    <label >Recommandations</label>
                    <textarea class="form-control" name="recommandations" id="recommandations" rows="3" placeholder="Tapez ici ..."></textarea>
                  </div>


                

                <div class="form-group">
                    <label >Zone occupée par</label>
                    <select class="form-control" id="typeevement" name="typeevement">
                        <option value="-">--Occupant--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Position FRDC la plus proche</label>
                    <input type="text" class="form-control" id="positinfrdcproche" name="positinfrdcproche" >
                </div>

                <div class="form-group">
                    <label >Source d'information</label>
                    <select class="form-control" id="typeevement" name="typeevement">
                        <option value="-">--Source--</option>                       
                    </select>
                </div>

                <div class="form-group">
                    <label >Détails source</label>
                    <input type="text" class="form-control" id="detailsourceinfo" name="detailsourceinfo" >
                </div>

                <h3>Localisation de l'alerte</h3>
                <hr>

                <div class="form-group">
                    <label >Province</label>
                    <select class="form-control" id="pcodeprovince" name="pcodeprovince" onchange="FetchTerritoires(this.id)">
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
                    <select class="form-control" id="pcodechefferie" name="pcodechefferie">
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
                    <select class="form-control" id="pcodezonesante" name="pcodezonesante">
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

                <div class="form-check">
                          <input name="is_resident_victime" id="is_resident_victime" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Résidents ?</label>
                 </div>

                 <div class="form-check">
                          <input name="is_retourne_victime" id="is_retourne_victime" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Retournés ?</label>
                 </div>

                 <div class="form-check">
                          <input name="is_refugie_victime" id="is_refugie_victime" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Réfugiés ?</label>
                 </div>

                 <div class="form-check">
                          <input name="is_rapatrie_victime" id="is_rapatrie_victime" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Rapatriés ?</label>
                 </div>

                 <div class="form-group">
                    <label >Autres victimes</label>
                    <input type="text" class="form-control" id="autre_victime" name="autre_victime" >
                </div>




                <h3>Auteurs presumés</h3>
                <hr>

                <div class="form-check">
                          <input name="is_frdc_auteur" id="is_frdc_auteur" class="form-check-input" type="checkbox">
                          <label class="form-check-label">FRDC ?</label>
                 </div>

                <div class="form-check">
                          <input name="is_pnc_auteur" id="is_pnc_auteur" class="form-check-input" type="checkbox">
                          <label class="form-check-label">PNC ?</label>
                 </div>

                 <div class="form-check">
                          <input name="is_milice_auteur" id="is_milice_auteur" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Miliciens/Groupe armé ?</label>
                 </div>

                 <div class="form-check">
                          <input name="is_population_auteur" id="is_population_auteur" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Population ?</label>
                 </div>

                 <div class="form-group">
                    <label >Autres auteurs</label>
                    <input type="text" class="form-control" id="autre_auteur" name="autre_auteur" >
                </div>



                <h3>Mouvement de population</h3>
                <hr>
                <div class="form-check">
                          <input name="descriptionfaits" id="descriptionfaits" class="form-check-input" type="checkbox">
                          <label class="form-check-label">Mouvement de population ?</label>
                 </div>

                 <div class="form-group">
                    <label >Type de mouvement</label>
                    <select class="form-control" id="typemouvement" name="typemouvement">
                        <option value="-">--Aire de santé--</option>                       
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
                    <input type="text" class="form-control" id=" nbre_menages" name=" nbre_menages" >
                </div>

                <div class="form-group">
                    <label >Nombre total de personnes</label>
                    <input type="text" class="form-control" id=" nbre_personnes" name=" nbre_personnes" >
                </div>

                <div class="form-group">
                    <label >Nombre de femmes</label>
                    <input type="text" class="form-control" id=" nbre_femmes" name=" nbre_femmes" >
                </div>

                <div class="form-group">
                    <label >Nombre d'hommes</label>
                    <input type="text" class="form-control" id=" nbre_hommes" name=" nbre_hommes" >
                </div>

                <div class="form-group">
                    <label >Nombre de filles</label>
                    <input type="text" class="form-control" id=" nbre_filles" name=" nbre_filles" >
                </div>

                <div class="form-group">
                    <label >Nombre de garçons</label>
                    <input type="text" class="form-control" id=" nbre_garcons" name=" nbre_garcons" >
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