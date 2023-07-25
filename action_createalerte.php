<?php 
require_once('Db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



if(isset($_POST['save']))
{
    session_start();
    $currentDateTime = new DateTime('now');
   // $anne= date('Y', strtotime($currentDateTime));  
    //$mois = date('F', strtotime($date)); 
   // $heure= date('H', $date);

   

    function gererateRandom()
    {
        $result=mt_rand(1000,9999);
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

   // $annee=getYear($currentDateTime);
    //$mois=getMonth($currentDateTime);
    //$jour=getDay($currentDateTime) ;
   // $hourString = $currentDateTime->format('H');
    //$minuteString = $currentDateTime->format('i');

    //Genere le numero de l'alerte
    $numero_alerte="ALRT".gererateRandom().time();


    
    $codealerte=$numero_alerte;//$_POST['codealerte'];
    $dateevenement=date('Y-m-d',strtotime($_POST['dateevenement']));
    $daterapportage=date('Y-m-d',strtotime($_POST['daterapportage']));//$_POST['daterapportage'];
    $lanceuralerte=$_POST['lanceur'];
    $typeevement=$_POST['typeevement'];
    $descriptionfaits=$_POST['descriptionfaits'];
    $recommandations=$_POST['recommandations'];
    $evenementsimilaire=$_POST['evenementsimilaire'];
    $dateevenementsimilaire=date('Y-m-d',strtotime($_POST['dateevenementsimilaire']));//$_POST['dateevenementsimilaire'];
    $occupantzone=$_POST['occupant'];
    $positinfrdcproche=$_POST['positinfrdcproche'];
    $sourceinfo=$_POST['sourceinfo'];
    $detailsourceinfo=$_POST['detailsourceinfo'];
    $telephoneverification=$_POST['telephoneverification'];
    $pcodeprovince=$_POST['pcodeprovince'];
    $pcodeterritoire=$_POST['pcodeterritoire'];
    $pcodechefferie=$_POST['pcodechefferie'];
    $pcodegroupement=$_POST['pcodegroupement'];
    $pcodezonesante=$_POST['pcodezonesante'];
    $pcodeairesante=$_POST['pcodeairesante'];
    $village=$_POST['village'];
    $axealerte=$_POST['axealerte'];
    $hasmouvementpopulation=$_POST['mouvement_population'];
    $village_provenance=$_POST['village_provenance'];
    $village_accueil=$_POST['village_accueil'];
    $nbre_menages=$_POST['nbre_menages'];
    $nbre_personnes=$_POST['nbre_personnes'];
    $nbre_hommes=$_POST['nbre_hommes'];
    $nbre_femmes=$_POST['nbre_femmes'];
    $nbre_filles=$_POST['nbre_filles'];
    $nbre_garcons=$_POST['nbre_garcons'];
    $auteur_presume=$_POST['auteurpresume'];
    $autre_auteur=$_POST['autre_auteur'];
    $autre_victime=$_POST['autre_victime'];
    $is_alerte_validee="NON";//$_POST[''];
    $datevalidation=date('Y-m-d',strtotime($_POST['dateevenementsimilaire']));//$_POST[''];
    $validatedby="";//$_POST[''];
    $infocomplementaire="";//$_POST[''];
    $type_infocomplementaire="";//$_POST[''];
    $impact_alerte=$_POST['impact_alerte'];
    $typemouvement=$_POST['typemouvement'];
    $created_by= $_SESSION['useremail'];//$_POST[''];  // A rendre dynamique
    $data_violations=$_POST['violations'];
    $violations_commises="";
    $data_victimes=$_POST['victimes'];
    $victimes="";
    $impacts="";

    $commentaires=$_POST['commentaires'];
    $autre_impact=$_POST['autre_impact'];

    foreach($data_violations as $violation)
    {
        $violations_commises=$violation."/".$violations_commises;
    }

    foreach($data_victimes as $victime)
    {
        $victimes=$victime."/".$victimes;
    }

    foreach($impact_alerte as $impact)
    {
        $impacts=$impact."/".$impacts;
    }
    
    echo $violations_commises;
    echo "<hr>";
    echo $victimes;
    echo "<hr>";
    echo $evenementsimilaire;

    //date_default_timezone_set('Africa/Nairobi');



 if(isset($_SESSION['useremail']))
 {
    try
    {
        //Connexion a la base de donnees
        //$conn = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
        
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
        $statment=$conn->prepare
        (
            "INSERT INTO  alerte
            
             (
             codealerte,
             dateevenement,
             daterapportage,
             lanceuralerte,
             typeevement,
             descriptionfaits,
             recommandations,
             evenementsimilaire,
             dateevenementsimilaire,
             occupantzone,
             positinfrdcproche,
             sourceinfo,
             detailsourceinfo,
             telephoneverification,
             pcodeprovince,
             pcodeterritoire,
             pcodechefferie,
             pcodegroupement,
             pcodezonesante,
             pcodeairesante,
             village,
             axealerte,
             hasmouvementpopulation,
             village_provenance,
             village_accueil,
             nbre_menages,
             nbre_personnes,
             nbre_hommes,
             nbre_femmes,
             nbre_filles,
             nbre_garcons,
             auteurpresume,             
             autre_auteur,            
             autre_victime,
             is_alerte_validee,
             datevalidation,
             validatedby,
             infocomplementaire,
             type_infocomplementaire,
             impact_alerte,
             typemouvement,
             created_by,
             violations_commises,
             victimes,
             commentaires,
             autre_impact

             )
             VALUES
             (
                ?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?


             )"
        );

        //Execution de la requete
        $statment->execute
        ([
            $codealerte,
            $dateevenement,
            $daterapportage,
            $lanceuralerte,
            $typeevement,
            $descriptionfaits,
            $recommandations,
            $evenementsimilaire,
            $dateevenementsimilaire,
            $occupantzone,
            $positinfrdcproche,
            $sourceinfo,
            $detailsourceinfo,
            $telephoneverification,
            $pcodeprovince,
            $pcodeterritoire,
            $pcodechefferie,
            $pcodegroupement,
            $pcodezonesante,
            $pcodeairesante,
            $village,
            $axealerte,
            $hasmouvementpopulation,
            $village_provenance,
            $village_accueil,
            $nbre_menages,
            $nbre_personnes,
            $nbre_hommes,
            $nbre_femmes,
            $nbre_filles,
            $nbre_garcons,
            $auteur_presume,            
            $autre_auteur,           
            $autre_victime,
            $is_alerte_validee,
            $datevalidation,
            $validatedby,
            $infocomplementaire,
            $type_infocomplementaire,
            $impacts,
            $typemouvement,
            $created_by,
            $violations_commises,
            $victimes,
            $commentaires,
            $autre_impact
        ]);
       
        
        //Recuperer les superviseur de la province pour envoyer les email
        $user_role="SUPERVISEUR";
        $province_code=$_SESSION['provinceuser'];

        $sql ="SELECT * FROM utilisateur WHERE user_role=? AND user_pcodeprovince=?";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$user_role,$province_code]);

        $superviseurs=$stmt->fetchAll();


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


        foreach($superviseurs as $sup){

            $mail->addAddress($sup['useremail']);
            $mail->isHTML(true);
            $mail->Subject="Nouvelle alerte....!!!";
            $mail->Body=$lanceuralerte." Signale un Evenement concernant ".$typeevement." dans le village de ".$village."<br>"."Connectez-vous a AlertBook pour les details";
            $mail->send();

        }
//-----------------------------------------------Fin Envoi Email-------------------------------

        $_SESSION['success_message']="Alerte enregistrée avec succès";
        //header('location:form_listalertes.php');
        $_SESSION['code_alerte']=$codealerte;
        header('location:form_addviolations.php?code_alerte='.$codealerte);

        //$codealerte
      
    }
    catch(PDOException $e){

        $_SESSION['error_message']="Une erreur est survenu avant la sauvegarde";
        header('location:form_error.php');


        return $e->getMessage();
    }

 }
 else{

    $_SESSION['error_message']="Veuillez vous connecter avant de continuer";
    header('location:form_login.php');


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