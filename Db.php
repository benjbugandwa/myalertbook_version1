<?php 



function getconnexion()
{
    $database='';
    $servername = 'us-cdbr-east-06.cleardb.net';
    $username = 'bdb618a206eb0e';
    $password = 'eecc22ba';

    try{
        $database=new PDO("mysql:host=$servername;dbname=heroku_6c3fffb0324e409", $username, $password);
        $database->exec("SET NAMES 'utf8';");
        return $database;
    }
    catch(PDOException $e)
    {
        throw new exception($e->getMessage());
    }
    
}

function redirect($message,$page)
{
    $_SESSION['message']=$message;
    header("Location: $page");
    exit(0);
}




?>
