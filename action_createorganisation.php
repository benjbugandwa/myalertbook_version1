

<?php 
//require_once('Database.php');
require_once('Db.php');
if(isset($_POST['save']))
{
    

    
    $user_role=$_SESSION['user_role'];

    //Collecter les données du formulaire
    $sigle=$_POST['sigle'];
    $denomination=$_POST['denomination'];
    $categorie=$_POST['categorie'];
    $secteur=$_POST['secteuractivite'];

    //parametres de connexion à la base des données 
    $servername = 'localhost';
    $username = 'root';
    $password = '';


    try
    {
        //Connexion a la base de donnees
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
        $statment=$conn->prepare
        (
            "INSERT INTO organisation(sigleorganisation,denomination,categorieorganisation,secteuractivite)
             VALUES(?,?,?,?)"
        );

        //Execution de la requete
        if($user_role=="ADMINISTRATEUR")
        {
            $statment->execute([$sigle,$denomination,$categorie, $secteur]);
            header('location:form_listorganisations.php');
            //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
         }
         else{

            $_SESSION['error_message']="Vous n'êtes pas autorisée à effectuer cette action: ";
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
    echo "IS NOT SET";
}

function isLoggedIn()
{
    if(isset($_SESSION['useremail']))
    {
            return true;
    }
    else{
        return false;
    }
}


?>