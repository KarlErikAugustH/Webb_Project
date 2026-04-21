<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Detta är databasklassen som hanterar anslutningen mot databasen.
-->



<?php
class Database{
    private $dsn = "";
    private $dbUsername = "";
    private $dbPassword = "";
    
       
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO($this->dsn, $this->dbUsername, $this->dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }        
    }

    public function getConnection(){
        return $this->pdo;
    }
}
