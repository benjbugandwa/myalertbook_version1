<?php 
require_once("database.php");


class OrganisationController
{
    private $id;
    private $sigle;
    private $denomination;
    private $categorie;
    private $secteuractivite;
    protected $dbcnx;
    

    public function __construct($id=0,$sigle="",$denomination="",$categorie="",$secteuractivite="")
    {
        $this->id=$id;
        $this->sigle=$sigle;
        $this->denomination=$denomination;
        $this->categorie=$categorie;
        $this->secteuractivite=$secteuractivite;

            

       
       //$this->dbcnx = new PDO("mysql:host=$servername;dbname=myalertbookdb", $username, $password);
       $this->dbcnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setId($id){$this->id=$id;}
    public function getId(){return $this->id;}

    public function setSigle($sigle){$this->sigle=$sigle;}
    public function getSigle(){return $this->sigle;}

    public function setDenomination($denomination){$this->denomination=$denomination;}
    public function getDenomination(){return $this->denomination;}

    public function setCategorie($categorie){$this->categorie=$categorie;}
    public function getCategorie(){return $this->categorie;}

    public function setSecteur($secteuractivite){$this->secteuractivite=$secteuractivite;}
    public function getSecteur(){return $this->secteuractivite;}

    public function insertData()
    {
        try
        {
            $statment=$this->dbcnx->prepare
            (
                "INSERT INTO organisation(sigleorganisation,denomination,categorieorganisation,secteuractivite)
                 VALUES(?,?,?,?)"
            );
            $statment->execute([$this->sigle,$this->denomination,$this->categorie,$this->secteuractivite]);
            echo "<script>alert('Donnees enregistrées avec succès');document.location='index.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchAll()
    {
        try
        {
            $statment=$this->dbcnx->prepare("SELECT * FROM organisation");
           
            $statment->execute();
            return $statment->fetchAll();
            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function fetchOne()
    {
        try
        {
            $statment=$this->dbcnx->prepare
            (
                "SELECT * FROM organisation WHERE idorganisation=?"
                
            );
            $statment->execute();
            return $statment->fetchAll();
            //echo "<script>alert('Donnees enregistrées avec succès');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function updateData()
    {
        try
        {
            $statment=$this->dbcnx->prepare
            (
                "UPDATE organisation SET sigleorganisation=?,denomination=?,categorieorganisation=?,secteuractivite=? WHERE idorganisation=?"
                
            );
            $statment->execute([$this->sigle,$this->denomination,$this->categorie,$this->secteuractivite,$this->id]);
            echo "<script>alert('Donnees mises à jour avec succès');document.location='allData.php'</script>";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

}

?>