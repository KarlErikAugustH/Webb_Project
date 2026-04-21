<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: AccountManager hanterar de funktioner som har med konton att göra.
-->


<?php
include("User.php");
include_once("Database.php");
include_once("PostManager.php");
class AccountManager{        

    public function createAccount($username, $password){
        if(empty($username) || empty($password)){ 
            header("Location: createAccount.php?signup=empty");
            exit();
        }
        elseif ($this->usernameControl($username)) { // kolla så en användare med detta användarnamn inte redan finns
            header("Location: createAccount.php?signup=taken");
            exit();
        }
        else{
            $user = new User($username, $password);
            $this->saveToDatabase($user);        
        }
    }
    
    private function saveToDatabase($user){// Sparar till databas
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO users(username, pwd) VALUES (:username, :pwd)");
        $username = $user->getUsername();
        $password = $user->getPassword();
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $password);
        $stmt->execute();        
    }

    private function usernameControl($username) : bool { // kontrollerar användarnamnet
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT username from users WHERE username=:username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function userSearch($searchTerm){ // hämtar användarnamn som matchar en sökterm
        $db = new Database;
        $conn = $db->getConnection();
        $searchTerm = "%$searchTerm%";        // icke case sensitive
        $stmt = $conn->prepare("SELECT * FROM users WHERE username LIKE :username");
        $stmt->bindParam(":username", $searchTerm);
        $stmt->execute();       
        return $stmt->fetchAll(PDO::FETCH_ASSOC);     // returnerar all data i en array så vi kan anropa en printfunktion   
    }

    public function deleteAccount(){
        $postManager = new PostManager;
        $postManager->deleteAllImages($_SESSION["userId"]); // ska kontot raderas måste bilderna från filsystemet tas bort 
        $db = new Database;
        $conn = $db->getConnection();        
        $stmt = $conn->prepare("DELETE FROM users WHERE userId = :userId");
        $stmt->bindParam(":userId", $_SESSION["userId"]);
        // try {
        //     //code...
        $stmt->execute();
        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }
        
    }    
}




?>