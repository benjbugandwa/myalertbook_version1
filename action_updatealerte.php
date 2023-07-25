<?php 
session_start();
require_once('Db.php');
if(isset($_POST['update']) && isset($_SESSION['useremail']))
{
    
    $currentDateTime = new DateTime('now');
  

    function gererateRandom()
    {
        $result=mt_rand(100000,999999);
        return strval($result);
    }

     function getYear($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("Y");
    }

     function getMonth($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("m");
    }

     function getDay($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("d");
    }

  

    $user_role=$_SESSION['user_role'];
    
    $codealerte=$_POST['codealerte'];
    $descriptionfaits=$_POST['descriptionfaits'];
    $recommandations=$_POST['recommandations'];
    $detailsourceinfo=$_POST['detailsourceinfo'];
    $telephoneverification=$_POST['telephoneverification'];   
    $village_provenance=$_POST['village_provenance'];
    $village_accueil=$_POST['village_accueil'];
    $nbre_menages=$_POST['nbre_menages'];
    $nbre_personnes=$_POST['nbre_personnes'];
    $nbre_hommes=$_POST['nbre_hommes'];
    $nbre_femmes=$_POST['nbre_femmes'];
    $nbre_filles=$_POST['nbre_filles'];
    $nbre_garcons=$_POST['nbre_garcons'];
    $auteur_presume=$_POST['auteurpresume'];
    $autre_victime=$_POST['autre_victime'];
    $is_alerte_validee=$_POST['valider']; 
    $validatedby=$_SESSION['useremail'];
    $infocomplementaire=$_POST['infocomplementaire'];
    $type_infocomplementaire=$_POST['type_infocomplementaire'];    
    $typemouvement=$_POST['typemouvement'];
    $updated_by=$_SESSION['useremail'];
 

   $currentDate = date("Y-m-d");
   $currentTime = date("H:i:s");
   $validation_date =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));
   
  
   


   if($is_alerte_validee=="OUI")
    {
        $validated_by=$_SESSION['useremail'];
        $validation_date =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));
    }
    else{

        $validatedby='';
        $validation_date=null;
    }


   // $dt = date('Y-m-d h:i:s');
    //$mydate=date('Y-m-d',strtotime($_POST['dateevenementsimilaire']));
    
  




    try
    {
        //Connexion a la base de donnees
        //$conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
        
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
$sql="UPDATE  alerte
SET
 
 
 descriptionfaits=:descriptionfaits,
 recommandations=:recommandations,
 detailsourceinfo=:detailsourceinfo,
 telephoneverification=:telephoneverification,
 village_provenance=:village_provenance,
 village_accueil=:village_accueil,
 nbre_menages=:nbre_menages,
 nbre_personnes=:nbre_personnes,
 nbre_hommes=:nbre_hommes,
 nbre_femmes=:nbre_femmes,
 nbre_filles=:nbre_filles,
 nbre_garcons=:nbre_garcons,
 auteurpresume=:auteurpresume,
 autre_victime=:autre_victime,
 is_alerte_validee=:is_alerte_validee,
 datevalidation=:datevalidation,
 validatedby=:validatedby,
 infocomplementaire=:infocomplementaire,
 type_infocomplementaire=:type_infocomplementaire,
 typemouvement=:typemouvement,
 updated_by=:updated_by,
 update_date=:update_date
 

 WHERE codealerte =:codealerte
 ";

$statement = $conn->prepare($sql);

$statement->bindParam(':descriptionfaits', $descriptionfaits);
$statement->bindParam(':recommandations', $recommandations);
$statement->bindParam(':detailsourceinfo', $detailsourceinfo);
$statement->bindParam(':telephoneverification', $telephoneverification);
$statement->bindParam(':village_provenance', $village_provenance);
$statement->bindParam(':village_accueil', $village_accueil);
$statement->bindParam(':nbre_menages', $nbre_menages);
$statement->bindParam(':nbre_personnes', $nbre_personnes);
$statement->bindParam(':nbre_hommes', $nbre_hommes);
$statement->bindParam(':nbre_femmes', $nbre_femmes);
$statement->bindParam(':nbre_filles', $nbre_filles);
$statement->bindParam(':nbre_garcons', $nbre_garcons);
$statement->bindParam(':auteurpresume', $auteur_presume);
$statement->bindParam(':autre_victime', $autre_victime);
$statement->bindParam(':is_alerte_validee', $is_alerte_validee);
$statement->bindParam(':datevalidation', $validation_date);
$statement->bindParam(':validatedby', $validated_by);
$statement->bindParam(':infocomplementaire', $infocomplementaire);
$statement->bindParam(':type_infocomplementaire', $type_infocomplementaire);
$statement->bindParam(':typemouvement', $typemouvement);
$statement->bindParam(':updated_by', $_SESSION['useremail']);
$statement->bindParam(':update_date', $currentDate);
$statement->bindParam(':codealerte', $codealerte);






        //Execution de la requete

        if($user_role!="MONITEUR")
        {
            if($statement->execute()) 
            {
                 // echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
                 $_SESSION['success_message']="Alerte mise à jour avec succès";
                 header('location:form_listalertes.php');
            }
            else{
                 $_SESSION['error_message']="Une erreur est survenu pendant la mise à jour";
                 header('location:form_detailalerte.php');
     
            }
        }
        else
        {
            $_SESSION['error_message']="Vous n etes pas autorisé à effectuer cette action: ";
            header('location:form_login.php');

        }
      
   
       
      
    }
    catch(Exception $e){

        $_SESSION['error_message']="Une erreur est survenue: ".$e->getMessage();
        header('location:form_error.php');

        return $e->getMessage();
    }

    
   
}
else
{
    $_SESSION['error_message']="Veuillez vous connectez pour effectuer cette action: ";
    header('location:form_login.php');
}






?>