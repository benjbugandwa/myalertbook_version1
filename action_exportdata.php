<?php 
//require_once('Database.php');
session_start();
require_once('Db.php');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

$province_user=$_SESSION['provinceuser'];


if(isset($_POST['export_excel_btn']))
{
        $file_ext_name=$_POST['file_ext'];
        $file_name="alertes_data";

        $date_debut=date('Y-m-d',strtotime($_POST['dateevenement']));
        $date_fin=date('Y-m-d',strtotime($_POST['daterapportage']));

        try
        {
            //Connexion a la base de donnees
            $conn = getconnexion(); //Cette methode est definie dans Db.php
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
    
            //Preparer la requete-insert
            $statment=$conn->prepare
            (
                "SELECT * FROM  alerte AS a
                 LEFT JOIN province AS p ON a.pcodeprovince=p.pcodeprovince
                 LEFT JOIN territoire AS t ON a.pcodeterritoire=t.pcodeterritoire
                 LEFT JOIN chefferie AS c ON  a.pcodechefferie=c.pcodechefferie
                 LEFT JOIN groupement AS g ON  a.pcodegroupement=g.pcodegroupement
                 LEFT JOIN zonesante AS z ON a.pcodezonesante=z.pcodezonesante
                 LEFT JOIN airesante AS r ON a.pcodeairesante=r.pcodeairesante 
                 LEFT JOIN violationalerte AS va ON a.codealerte=va.code_alerte
                 INNER JOIN violation AS v ON va.code_violation=v.CodeViolation            
                 WHERE a.pcodeprovince=? AND dateevenement BETWEEN ? AND ?
                 "
            );
    
            
            $statment->execute([$province_user,$date_debut,$date_fin]);    
            $alertes=$statment->fetchAll();

            if($alertes!=NULL)
            {

                $spreadsheet = new Spreadsheet();
                $activeWorksheet = $spreadsheet->getActiveSheet();


                $activeWorksheet->setCellValue('A1', 'codealerte');
                $activeWorksheet->setCellValue('B1', 'dateevenement');
                $activeWorksheet->setCellValue('C1', 'daterapportage');
                $activeWorksheet->setCellValue('D1', 'lanceuralerte');
                $activeWorksheet->setCellValue('E1', 'typeevement');
                $activeWorksheet->setCellValue('F1', 'descriptionfaits');
                $activeWorksheet->setCellValue('G1', 'recommandations');
                $activeWorksheet->setCellValue('H1', 'evenementsimilaire');
                $activeWorksheet->setCellValue('I1', 'dateevenementsimilaire');
                $activeWorksheet->setCellValue('J1', 'occupantzone');
                $activeWorksheet->setCellValue('K1', 'positinfrdcproche');
                $activeWorksheet->setCellValue('L1', 'sourceinfo');
                $activeWorksheet->setCellValue('M1', 'detailsourceinfo');
                $activeWorksheet->setCellValue('N1', 'telephoneverification');
                $activeWorksheet->setCellValue('O1', 'province');
                $activeWorksheet->setCellValue('P1', 'territoire');
                $activeWorksheet->setCellValue('Q1', 'chefferie');
                $activeWorksheet->setCellValue('R1', 'groupement');
                $activeWorksheet->setCellValue('S1', 'zonedesante');
                $activeWorksheet->setCellValue('T1', 'airedesante');
                $activeWorksheet->setCellValue('U1', 'localite');
                $activeWorksheet->setCellValue('V1', 'axe');
                $activeWorksheet->setCellValue('W1', 'hasmouvementpopulation');
                $activeWorksheet->setCellValue('X1', 'village_provenance');
                $activeWorksheet->setCellValue('Y1', 'village_accueil');
                $activeWorksheet->setCellValue('Z1', 'nbre_menages');
                $activeWorksheet->setCellValue('AA1', 'nbre_personnes');
                $activeWorksheet->setCellValue('AB1', 'nbre_hommes');
                $activeWorksheet->setCellValue('AC1', 'nbre_femmes');
                $activeWorksheet->setCellValue('AD1', 'nbre_filles');
                $activeWorksheet->setCellValue('AE1', 'nbre_garcons');
                $activeWorksheet->setCellValue('AF1', 'autre_auteur');
                $activeWorksheet->setCellValue('AG1', 'autre_victime');
                $activeWorksheet->setCellValue('AH1', 'is_alerte_validee');
                $activeWorksheet->setCellValue('AI1', 'datevalidation');
                $activeWorksheet->setCellValue('AJ1', 'validatedby');
                $activeWorksheet->setCellValue('AK1', 'infocomplementaire');
                $activeWorksheet->setCellValue('AL1', 'type_infocomplementaire');
                $activeWorksheet->setCellValue('AM1', 'impact_alerte');
                $activeWorksheet->setCellValue('AN1', 'typemouvement');
                $activeWorksheet->setCellValue('AO1', 'created_by');
                $activeWorksheet->setCellValue('AP1', 'violations_commises');
                $activeWorksheet->setCellValue('AQ1', 'auteurpresume');
                $activeWorksheet->setCellValue('AR1', 'victimes');
                $activeWorksheet->setCellValue('AS1', 'updated_by');
                $activeWorksheet->setCellValue('AT1', 'update_date');
                $activeWorksheet->setCellValue('AU1', 'autre_impact');
                $activeWorksheet->setCellValue('AV1', 'commentaires');
                $activeWorksheet->setCellValue('AW1', 'violation');
                $activeWorksheet->setCellValue('AX1', 'nbrevictimes');
              
                $rowcount=2;
                foreach($alertes as $alerte)
                {
                    $activeWorksheet->setCellValue('A'.$rowcount, $alerte['codealerte']);
                    $activeWorksheet->setCellValue('B'.$rowcount, $alerte['dateevenement']);
                    $activeWorksheet->setCellValue('C'.$rowcount, $alerte['daterapportage']);
                    $activeWorksheet->setCellValue('D'.$rowcount, $alerte['lanceuralerte']);
                    $activeWorksheet->setCellValue('E'.$rowcount, $alerte['typeevement']);
                    $activeWorksheet->setCellValue('F'.$rowcount, $alerte['descriptionfaits']);
                    $activeWorksheet->setCellValue('G'.$rowcount, $alerte['recommandations']);
                    $activeWorksheet->setCellValue('H'.$rowcount, $alerte['evenementsimilaire']);
                    $activeWorksheet->setCellValue('I'.$rowcount, $alerte['dateevenementsimilaire']);
                    $activeWorksheet->setCellValue('J'.$rowcount, $alerte['occupantzone']);
                    $activeWorksheet->setCellValue('K'.$rowcount, $alerte['positinfrdcproche']);
                    $activeWorksheet->setCellValue('L'.$rowcount, $alerte['sourceinfo']);
                    $activeWorksheet->setCellValue('M'.$rowcount, $alerte['detailsourceinfo']);
                    $activeWorksheet->setCellValue('N'.$rowcount, $alerte['telephoneverification']);
                    $activeWorksheet->setCellValue('O'.$rowcount, $alerte['nomprovince']);
                    $activeWorksheet->setCellValue('P'.$rowcount, $alerte['nomterritoire']);
                    $activeWorksheet->setCellValue('Q'.$rowcount, $alerte['nomchefferie']);
                    $activeWorksheet->setCellValue('R'.$rowcount, $alerte['nomgroupement']);
                    $activeWorksheet->setCellValue('S'.$rowcount, $alerte['nomzonesante']);
                    $activeWorksheet->setCellValue('T'.$rowcount, $alerte['nomairesante']);
                    $activeWorksheet->setCellValue('U'.$rowcount, $alerte['village']);
                    $activeWorksheet->setCellValue('V'.$rowcount, $alerte['axealerte']);
                    $activeWorksheet->setCellValue('W'.$rowcount, $alerte['hasmouvementpopulation']);
                    $activeWorksheet->setCellValue('X'.$rowcount, $alerte['village_provenance']);
                    $activeWorksheet->setCellValue('Y'.$rowcount, $alerte['village_accueil']);
                    $activeWorksheet->setCellValue('Z'.$rowcount, $alerte['nbre_menages']);
                    $activeWorksheet->setCellValue('AA'.$rowcount, $alerte['nbre_personnes']);
                    $activeWorksheet->setCellValue('AB'.$rowcount, $alerte['nbre_hommes']);
                    $activeWorksheet->setCellValue('AC'.$rowcount, $alerte['nbre_femmes']);
                    $activeWorksheet->setCellValue('AD'.$rowcount, $alerte['nbre_filles']);
                    $activeWorksheet->setCellValue('AE'.$rowcount, $alerte['nbre_garcons']);
                    $activeWorksheet->setCellValue('AF'.$rowcount, $alerte['autre_auteur']);
                    $activeWorksheet->setCellValue('AG'.$rowcount, $alerte['autre_victime']);
                    $activeWorksheet->setCellValue('AH'.$rowcount, $alerte['is_alerte_validee']);
                    $activeWorksheet->setCellValue('AI'.$rowcount, $alerte['datevalidation']);
                    $activeWorksheet->setCellValue('AJ'.$rowcount, $alerte['validatedby']);
                    $activeWorksheet->setCellValue('AK'.$rowcount, $alerte['infocomplementaire']);
                    $activeWorksheet->setCellValue('AL'.$rowcount, $alerte['type_infocomplementaire']);
                    $activeWorksheet->setCellValue('AM'.$rowcount, $alerte['impact_alerte']);
                    $activeWorksheet->setCellValue('AN'.$rowcount, $alerte['typemouvement']);
                    $activeWorksheet->setCellValue('AO'.$rowcount, $alerte['created_by']);
                    $activeWorksheet->setCellValue('AP'.$rowcount, $alerte['violations_commises']);
                    $activeWorksheet->setCellValue('AQ'.$rowcount, $alerte['auteurpresume']);
                    $activeWorksheet->setCellValue('AR'.$rowcount, $alerte['victimes']);
                    $activeWorksheet->setCellValue('AS'.$rowcount, $alerte['updated_by']);
                    $activeWorksheet->setCellValue('AT'.$rowcount, $alerte['update_date']);
                    $activeWorksheet->setCellValue('AU'.$rowcount, $alerte['autre_impact']);
                    $activeWorksheet->setCellValue('AV'.$rowcount, $alerte['commentaires']);
                    $activeWorksheet->setCellValue('AW'.$rowcount, $alerte['Denomination']);
                    $activeWorksheet->setCellValue('AX'.$rowcount, $alerte['nbre_victimes']);


                    $rowcount++;
                }

                if($file_ext_name=='xlsx')
                {
                    $writer = new Xlsx($spreadsheet);
                    $final_filename=$file_name.'.xls';
                    //$writer->save('hello world.xlsx');
                }
                else if($file_ext_name=='csv'){
                    $writer = new Csv($spreadsheet);
                    $final_filename=$file_name.'.csv';
                }

                // $writer->save($final_filename);
                header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition:attachment;filename="'.urlencode($final_filename).'"');
                $writer->save('php://output');
                                       
            }
            else
            {
                $SESSION['error_message']="Rien à exporter";
               // header('Location:form_home.php');

                echo $date_debut;
                
            }
    
    
        }
        catch(Exception $e){
            $_SESSION['error_message']="Une erreur est survenue: ".$e->getMessage();
            header('location:form_error.php');
            return $e->getMessage();
        }

}

 
?>