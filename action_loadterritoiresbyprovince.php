<?php


require_once('Db.php');
if(isset($_POST['pcodeprovince']))
{
    //parametres de connexion à la base des données 

    $pcodeprovince=$_POST['pcodeprovince'];
    echo $pcodeprovince;

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
    $statment_territoires=$conn->prepare("SELECT * FROM territoire WHERE pcodeprovince=?");
      
    //Execution de la requete
    $statment_territoires->execute([$pcodeprovince]);
   
    //Recuperation des resultats de la requete
    $territoires=$statment_territoires->fetchAll();

    if($territoires!=NULL){
        echo '<option value="-">--Sélectionnez--</option>';
        foreach($territoires as $territoire){
            echo '<option value="'.$territoire['pcodeterritoire'].'">'.$territoire['nomterritoire'].'</option>';
        }

    }
    else{
        echo '<option value="-">--Territoire--</option>';
    }
   

    //Test affichage du resultat
    //var_dump($provinces);
}
catch(Exception $e){
    return $e->getMessage();
}
}




?>
