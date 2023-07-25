<?php 



function getconnexion()
{
    $database='';
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try{
        $database=new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
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