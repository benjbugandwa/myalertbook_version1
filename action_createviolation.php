<?php 
session_start();
require_once('Db.php');




     $codealerte=$_POST['codealerte'];
  
     $nbre_victimes=$_POST['nbre_victimes'];
     $commentaires=$_POST['commentaires'];
     $codeviolation=$_POST['codeviolation'];
    
    
     
      echo $codealerte;
      echo $codeviolation;
      echo $nbre_victimes;
      echo $commentaires;
     //get current date
    // $date = date('Y-m-d H:i:s');
    // $createdate=date('Y-m-d',strtotime(date('Y-m-d H:i:s')));

    //$_SESSION['code_alerte']=$codealerte;
     try
     {
         $conn = getconnexion(); //Cette methode est definie dans Db.php
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
         $statment=$conn->prepare
         (
             "INSERT INTO violationalerte
             (
                code_alerte,
                nbre_victimes,
                commentaires_violation,
                code_violation
                
                
                
                )
              VALUES(?,?,?,?)"
         );
 
         //Execution de la requete

         
         $statment->execute
         ([


            $codealerte,         
            $nbre_victimes,
            $commentaires,
            $codeviolation
                        
         ]);
        
        
        //echo "Data added successfully";
         echo json_encode(array("statusCode"=>200));
         //$_SESSION['success_message']="Violation enregistrée avec succès";
         //header('location:form_addviolations.php');
         
     }
     catch(Exception $e){
        $_SESSION['error_message']="Une erreur est survenue: ".$e->getMessage();
        header('location:form_error.php');
         return $e->getMessage();
     }
 
    


?>