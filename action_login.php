<?php 
session_start();

require_once('Db.php');


function userAuthentication()
{
    $_SESSION['authenticated']=true;
}
if(isset($_POST['loginbtn']))
{
    


    //Collecter les données du formulaire
    $useremail=$_POST['useremail'];
    $userpassword=$_POST['userpassword'];
    

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
        $statment=$conn->prepare("SELECT * FROM utilisateur WHERE useremail=? AND user_password=?");
            
        //Execution de la requete
        $statment->execute([$useremail,$userpassword]);

        $users=$statment->fetchAll();

        if($users!=NULL)
        {
            
            

            foreach($users as $user)           
            {

                if($user['user_isactive']=="Oui")
                {
                    $_SESSION['authenticated']=true;
                    $_SESSION['useremail']=$user['useremail'];
                    $_SESSION['usernames']=$user['fullname'];
                    $_SESSION['user_role']=$user['user_role'];
                    $_SESSION['userorganisation']=$user['sigle_organisation'];
                    $_SESSION['provinceuser']=$user['user_pcodeprovince'];
                    header('location:form_home.php');

                }
                else
                {
                    $_SESSION['error_message']='Votre compte est inactif. Contactez votre administrateur';
                    header('location:form_login.php');

                }


               
            }
            
        }
        else{
            
            $_SESSION['error_message']='email ou mot de passe incorrect...';
            header('location:form_login.php');

        }
            
    }
    catch(Exception $e){
        return $e->getMessage();
    }

    
   
}
else
{
    if(isset($_SESSION['useremail']))
    {
                unset($_SESSION['authenticated']);
                unset($_SESSION['useremail']);
                unset($_SESSION['usernames']);
                unset($_SESSION['user_role']);
                unset($_SESSION['userorganisation']);
                unset($_SESSION['provinceuser']);
                //header('location:index.php');
    }

    header('location:form_login.php');

   // echo "IS NOT SET";
}

?>