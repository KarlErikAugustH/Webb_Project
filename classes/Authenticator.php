<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Authenticator inloggning och utloggning samt startande av session
-->



<?php 
include_once("Database.php");
class Authenticator{
    public function login($username, $password){
        if(empty($username) || empty($password)){
            header("Location: login.php?signup=empty");
            exit();
        }
        elseif (!$this->doesUserExist($username, $password)) { // kolla så användaren finns
            header("Location: login.php?signup=wrongUser");
            exit();
        }
        else {
            $userId = $this->getUserId($username); // hämtar användar id för att på ett enkelt sätt veta vilken användare som är inloggad
            $this->startSession($username, $userId); // startar sessionen
        }                   
    }

    public function doesUserExist($username, $password) : bool { // Kollar om användaren finns
        $db = new Database;
        $conn = $db->getConnection();    
        $stmt = $conn->prepare("SELECT pwd FROM users WHERE BINARY username=:username AND BINARY pwd=:pwd"); //Binary för att inputen ska vara skiftläges känslig https://www.w3schools.com/mysql/func_mysql_binary.asp        
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $password);
        $stmt->execute();    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    private function getUserId($username){
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT userId FROM users WHERE username=:username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        $userId = $result["userId"];
        return $userId;
    }

    private function startSession($username, $userId){ // startar sessionen
        session_start();
        $_SESSION["username"] = $username;        
        $_SESSION["userId"] = $userId;
    }

    public function logOut(){ // loggar ut användaren
        session_unset();
        session_destroy();
    }    
}
?>