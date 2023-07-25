<?php

require_once('Db.php');

if(isset($_POST['pcodeterritoire']))
{
    //parametres de connexion à la base des données 

    $pcodeterritoire=$_POST['pcodeterritoire'];
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
    $statment_zonesante=$conn->prepare("SELECT * FROM zonesante WHERE pcodeterritoire=?");
      
    //Execution de la requete
    $statment_zonesante->execute([$pcodeterritoire]);
   
    //Recuperation des resultats de la requete
    $zonesantes=$statment_zonesante->fetchAll();

    if($zonesantes!=NULL){
        echo '<option value="-">--Sélectionnez--</option>';
        foreach($zonesantes as $zs){
            echo '<option value="'.$zs['pcodezonesante'].'">'.$zs['nomzonesante'].'</option>';
        }

    }
    else{
        echo '<option value="-">--zone--</option>';
    }
   

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}
}




?>
