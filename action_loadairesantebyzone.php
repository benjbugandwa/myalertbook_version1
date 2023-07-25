<?php

require_once('Db.php');

if(isset($_POST['pcodezonesante']))
{
    //parametres de connexion à la base des données 

    $pcodezonesante=$_POST['pcodezonesante'];
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
    $statment_airesante=$conn->prepare("SELECT * FROM airesante WHERE pcodezonesante=?");
      
    //Execution de la requete
    $statment_airesante->execute([$pcodezonesante]);
   
    //Recuperation des resultats de la requete
    $airesantes=$statment_airesante->fetchAll();

    if($airesantes!=NULL){
        echo '<option value="-">--Sélectionnez--</option>';

        foreach($airesantes as $rs){
            echo '<option value="'.$rs['pcodeairesante'].'">'.$rs['nomairesante'].'</option>';
        }

    }
    else{
        echo '<option value="-">--Aire--</option>';
    }
   

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}
}




?>
