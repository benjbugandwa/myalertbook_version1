<?php 
session_start();
require_once('Db.php');


if(isset($_POST['saveuser']))
{
     //Collecter les données du formulaire
     $email=$_POST['email'];
     $password=$_POST['password'];
     $passwordconf=$_POST['confirmpassword'];
     $organisation=$_POST['organisation'];
     $fullname=$_POST['fullname'];     
     $userrole=$_POST['user_role'];     
     $telephone=$_POST['phonenumber'];
     $isactive="Oui";
     $province=$_POST['province'];
     $passwordchanged="Non";
     $passwordchangeddate=null;
     $createdby=$_SESSION['useremail'];

     //get current date
    // $date = date('Y-m-d H:i:s');
    // $createdate=date('Y-m-d',strtotime(date('Y-m-d H:i:s')));


     try
     {
         $conn = getconnexion(); //Cette methode est definie dans Db.php
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
         $statment=$conn->prepare
         (
             "INSERT INTO utilisateur
             (
                useremail,
                user_password,
                sigle_organisation,
                fullname,
                user_role,
                user_phonenumber,
                user_isactive,
                user_pcodeprovince,
                user_passwordchanged,
                passwordchanged_date,
                user_createdby
                
                )
              VALUES(?,?,?,?,?,?,?,?,?,?,?)"
         );
 
         //Execution de la requete

         
         $statment->execute
         ([


            $email,
            $password,
            $organisation,
            $fullname,    
            $userrole,    
            $telephone,
            $isactive,
            $province,
            $passwordchanged,
            $passwordchangeddate,
            $createdby
            
         ]);



         //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
        $_SESSION['success_message']="Utilisateur enregistré avec succès";
        header('location:form_listusers.php');
     }
     catch(Exception $e){
        $_SESSION['error_message']="Une erreur est survenue: ".$e->getMessage();
        header('location:form_error.php');
         return $e->getMessage();
     }
 
    
}

?>