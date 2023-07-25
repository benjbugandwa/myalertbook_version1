<?php 
session_start();
require_once('Db.php');
if(isset($_POST['savereponse']))
{

    //$alertecode=$_GET['numalerte'];
    function gererateRandom()
    {
        $result=mt_rand(1000,9999);
        return strval($result);
    }


    $currentDate = date("Y-m-d");
    $currentTime = date("H:i:s");
    //$create_date =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));

     //Collecter les données du formulaire
     $reponsecode ="RPS".gererateRandom().time();
     $alertecode=$_POST['alertecode'];
     $date_reponse=date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));
     $organisation=$_POST['organisation'];
     $organisation_autre=$_POST['organisation_autre'];     
     $type_reponse=$_POST['type_reponse'];     
     $secteurs_couverts=$_POST['secteurs_couverts'];
     $modalite_intervention=$_POST['modalite_intervention'];
     $secteur_autre=$_POST['secteur_autre'];
     $nbre_beneficiares_menages=$_POST['nbre_beneficiares_menages'];
     $nbre_beneficiaires_individus=$_POST['nbre_beneficiaires_individus'];
     $source_financement=$_POST['source_financement'];
     $lieu_intervention_localite=$_POST['lieu_intervention_localite'];
     $create_date=date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));
     $created_by=$_SESSION['useremail'];
     $detail_intervention=$_POST['detail_intervention'];

     //get current date
    // $date = date('Y-m-d H:i:s');
    // $createdate=date('Y-m-d',strtotime(date('Y-m-d H:i:s')));


     try
     {
         $conn = getconnexion(); //Cette methode est definie dans Db.php
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
         $statment=$conn->prepare
         (
             "INSERT INTO reponse
             (
                reponsecode,
                alertecode,
                date_reponse,
                organisation,
                organisation_autre,
                type_reponse,
                secteurs_couverts,
                modalite_intervention,
                secteur_autre,
                nbre_beneficiares_menages,
                nbre_beneficiaires_individus,
                source_financement,
                lieu_intervention_localite,
                create_date,
                created_by,
                detail_intervention
                
                )
              VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"
         );
 
         //Execution de la requete

         
         $statment->execute
         ([


            $reponsecode,
            $alertecode,
            $date_reponse,
            $organisation,
            $organisation_autre,    
            $type_reponse,  
            $secteurs_couverts,
            $modalite_intervention,
            $secteur_autre,
            $nbre_beneficiares_menages,
            $nbre_beneficiaires_individus,
            $source_financement,
            $lieu_intervention_localite,
            $create_date,
            $created_by,
            $detail_intervention
            
         ]);


         
         //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
        $_SESSION['success_message']="Réponse enregistrée avec succès";
        header('location:form_listreponses.php.php');
     }
     catch(Exception $e){

        $_SESSION['error_message']="Une erreur est survenue:".$e->getMessage();
        header('location:form_error.php');
         return $e->getMessage();
     }

}


?>