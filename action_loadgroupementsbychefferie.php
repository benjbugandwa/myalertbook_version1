<?php

require_once('Db.php');

if(isset($_POST['pcodechefferie']))
{
    //parametres de connexion à la base des données 

    $pcodechefferie=$_POST['pcodechefferie'];
    //echo $pcodeprovince;

$servername = 'localhost';
$username = 'root';
$password = '';




try
{
    //Connexion a la base de donnees
    //$conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
    $conn = getconnexion();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Preparer la requete-insert
    $statment_groupements=$conn->prepare("SELECT * FROM groupement WHERE pcodechefferie=?");
      
    //Execution de la requete
    $statment_groupements->execute([$pcodechefferie]);
   
    //Recuperation des resultats de la requete
    $groupements=$statment_groupements->fetchAll();

    if($groupements!=NULL){
        echo '<option value="-">--Sélectionnez--</option>';
        foreach($groupements as $groupement){
            echo '<option value="'.$groupement['pcodegroupement'].'">'.$groupement['nomgroupement'].'</option>';
        }

    }
    else{
        echo '<option value="-">--Groupement--</option>';
    }
   

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}
}




?>
