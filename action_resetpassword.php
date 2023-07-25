<?php 
session_start();
require_once('Db.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['resetpass']))
{
    $email=$_POST['email'];

    if($email!='')
    {

        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        $bytes = openssl_random_pseudo_bytes(3);
        $newPassword=bin2hex($bytes);


        //Update password in database

        $sql="UPDATE utilisateur SET user_password=:user_password WHERE useremail=:useremail";
        $statement = $conn->prepare($sql);

        $statement->bindParam(':user_password', $newPassword);
        $statement->bindParam(':useremail', $email);


        if($statement->execute()) 
        {
               //----------------------------------------------Envoi Email-------------------------------
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='alertbookclusterprotection@gmail.com';
        $mail->Password='bvefilrjawiqrejw';
        $mail->SMTPSecure='ssl';
        $mail->Port=465;
        $mail->setFrom('alertbookclusterprotection@gmail.com');

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject="Votre mot de passe a ete mis a jour";
        $mail->Body="Votre nouveau mot de passe est: ".$newPassword;
        $mail->send();


        
//-----------------------------------------------Fin Envoi Email------------------------------- 
             $_SESSION['success_message']="Un nouveau mot de passe a été envoyé à votre adresse email";
             header('location:form_login.php');
        }
        else{
             $_SESSION['error_message']="Impossible de réinitialiser le mot de passe.";
             header('location:form_login.php');
 
        }



         
    }
    else
    {

    }
}


?>