<?php 
session_start();
require_once('Db.php');


$search=$_POST['search'];
$pcodeprovince_user=$_SESSION['provinceuser'];

try
{
    //Connexion a la base de donnees
    $conn = getconnexion(); //Cette methode est definie dans Db.php
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    

    //Preparer la requete-insert

    if($search!='')
    {
        $statment=$conn->prepare
        (
            "SELECT * FROM alerte             
            WHERE pcodeprovince=? AND (codealerte LIKE '%$search%'  OR typeevement LIKE '%$search%' OR lanceuralerte LIKE '%$search%' OR village LIKE '%$search%')
            ORDER BY idalerte DESC"
            
             
        );
    }
    else{

        $statment=$conn->prepare
        (
            "SELECT * FROM alerte             
            WHERE pcodeprovince=? 
            ORDER BY idalerte DESC"
            
             
        );
    }

   

    //Execution de la requete
    $statment->execute([$pcodeprovince_user]);

    $data=$statment->fetchAll();

    if(isset($data[0]))
    {
            $html='<table class="table table-hover text-nowrap" id="table_listalertes">
            <thead>
              <tr>
                <th>N° Alerte</th>
                <th>Evenement</th>
                <th>Date de survenance</th>
                <th>Localité/village touchée</th>
                <th>Axe</th>
                <th>Impact</th>
                <th>Auteur présumé</th>
                <th>Lanceur alerte</th>
                <th>Alerte validée</th>
                <th></th>
              </tr>
            </thead>';
            //$html.='</table>';
            foreach($data as $item){

                $html.='<tr>
                <td><a href="form_detailalerte.php?numalerte='.$item['codealerte'].'" method="get" class="nav-link active"><b> '.$item['codealerte'].'</b></a></td>
                <td>'.$item['typeevement'].'</td>
                <td>'.$item['dateevenement'].'</td>
                <td>'.$item['village'].'</td>
                <td>'.$item['axealerte'].'</td>
                <td>'.$item['impact_alerte'].'</td>
                <td>'.$item['auteurpresume'].'</td>
                <td>'.$item['lanceuralerte'].'</td>
                <td>'.$item['is_alerte_validee'].'</td>
                <td><a href="form_valideralerte.php?numalerte='.$item['codealerte'].'" method="get" class="nav-link active"><b> '.'Valider'.'</b></a></td>
              </tr>';

            }

            $html.='</table>';
            echo $html;
    }
    else{

        $html='<table class="table table-hover text-nowrap" id="table_listalertes">
            <thead>
              <tr>
                <th>N° Alerte</th>
                <th>Evenement</th>
                <th>Date de survenance</th>
                <th>Localité/village touchée</th>
                <th>Axe</th>
                <th>Impact</th>
                <th>Auteur présumé</th>
                <th>Lanceur alerte</th>
                <th>Alerte validée</th>
              </tr>
            </thead>';

            $html.='<tr>
            <td colspan="9"> Aucune alerte trouvée</td>
            </tr>';

            $html.='</table>';

        echo $html;
    }


    //echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
}
catch(Exception $e){
    return $e->getMessage();
}





?>