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
   // $conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
    $conn = getconnexion();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Preparer la requete-insert
    $statment_chefferies=$conn->prepare("SELECT * FROM chefferie WHERE pcodeterritoire=?");
      
    //Execution de la requete
    $statment_chefferies->execute([$pcodeterritoire]);
   
    //Recuperation des resultats de la requete
    $chefferies=$statment_chefferies->fetchAll();

    if($chefferies!=NULL){
        echo '<option value="-">--Sélectionnez--</option>';
        foreach($chefferies as $chefferie){
            echo '<option value="'.$chefferie['pcodechefferie'].'">'.$chefferie['nomchefferie'].'</option>';
        }

    }
    else{
        echo '<option value="-">--chefferie--</option>';
    }
   

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}
}




?>
