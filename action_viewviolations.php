<?php 
//require_once('Database.php');
session_start();
require_once('Db.php');
/*if($_SESSION['user_role']=="ADMINISTRATEUR")
{*/
    


    try
    {
        //Connexion a la base de donnees
        $conn = getconnexion(); //Cette methode est definie dans Db.php
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        

        //Preparer la requete-insert
        $statment=$conn->prepare
        (
            "SELECT * FROM violationalerte AS va INNER JOIN violation v ON va.code_violation=v.CodeViolation WHERE code_alerte=?"           
                         
        );

        $code_alerte=$_SESSION['code_alerte'];

        //Execution de la requete
        $statment->execute([$code_alerte]);

        $violations=$statment->fetchAll();

        foreach( $violations as $row)
        {
?>

        <tr>
			<td><?=$row['Denomination'];?></td>
			<td><?=$row['nbre_victimes'];?></td>
			<td><?=$row['commentaires_violation'];?></td>
			
		</tr>

            
<?php
        }

    
    }
    catch(Exception $e){
        return $e->getMessage();
    }

?>