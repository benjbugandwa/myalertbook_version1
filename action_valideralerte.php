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

 
   $currentDate = date("Y-m-d");
   

   $user_role=$_SESSION['user_role'];
    
   $codealerte=$_POST['codealerte'];    
   $is_alerte_validee='Oui'; 
   $validation_date =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));
   $updated_by=$_SESSION['useremail'];
   $validated_by=$_SESSION['useremail'];
   
    try
    {
        //Connexion a la base de donnees
        //$conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
        
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="UPDATE  alerte
SET
 
 is_alerte_validee=:is_alerte_validee,
 datevalidation=:datevalidation,
 validatedby=:validatedby,
 updated_by=:updated_by,
 update_date=:update_date
 

 WHERE codealerte =:codealerte
 ";

$statement = $conn->prepare($sql);


$statement->bindParam(':is_alerte_validee', $is_alerte_validee);
$statement->bindParam(':datevalidation', $validation_date);
$statement->bindParam(':validatedby', $validated_by);
$statement->bindParam(':updated_by', $validated_by);
$statement->bindParam(':update_date', $currentDate);
$statement->bindParam(':codealerte', $codealerte);






        //Execution de la requete

        if($user_role!="MONITEUR")
        {
            if($statement->execute()) 
            {
                 // echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
                 $_SESSION['success_message']="Alerte validée avec succès";
                 header('location:form_listalertes.php?start=0');
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