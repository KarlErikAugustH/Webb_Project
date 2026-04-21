<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Postmanager hanterar publicerungen av inläggen.
-->


<?php
include_once("Database.php");
include("Post.php");
class postManager{
    
    public function createPost($title, $text, $image){ // store to database                        
        if(empty($title) || empty($text) || $_FILES["fileName"]["error"] == 4 ){ //error code 4 = no file was uploaded https://www.php.net/manual/en/reserved.variables.files.php#105640
            header("Location: create.php?signup=empty");
            exit();
        }
        $post = new Post($title, $text, $image);
        $this->savePost($post);
    }

    private function savePost($post){        
        $db = new Database;
        $conn = $db->getConnection();         
        $stmt = $conn->prepare("INSERT INTO posts(usersId, title, texts, postDate, images) VALUES (:usersId, :title, :texts, :postDate, :images)");           
        // sparar namnet på filen på databasen men självaste filen på filsystemet
        $userId = $_SESSION["userId"];
        $title = $post->getTitle();
        $text = $post->getText();
        $date = $post->getDate();        
        $tmp = $post->getImage();        
        $imageName = $tmp["name"];
        $uniqId = uniqid(); // lägger till ett unikt id på varje bild ifall en bild laddas upp två gånger
        $imageName = $uniqId . $imageName; // lägger id till bilden namn
        $stmt->bindParam(":usersId", $userId);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":texts", $text);
        $stmt->bindParam(":postDate", $date);
        $stmt->bindParam(":images", $imageName);      
        echo "hej2";     
        try {
            $stmt->execute(); 
        } catch (Exception $e) {
            echo $e->getMessage();
        }        
                                                                
        echo "hej3";
        if(move_uploaded_file($tmp["tmp_name"], "../writeable/images/" . $uniqId . basename($tmp["name"]))){
            //echo "hej succ";
        }
        else{
            echo "error";
        } // https://www.youtube.com/watch?v=Ipa9xAs_nTg&list=LL&index=6                        
        // flyttar den uppladdad filen från den temporära lagringen till mappen på filsystemet
    }

    public function getUserPost($username){
        $db = new Database;
        $conn = $db->getConnection();            
        $stmt = $conn->prepare("SELECT * FROM posts JOIN users ON posts.usersId = users.userId WHERE users.username =:username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // returnerar en array med en användares alla poster                           
    }

    public function deletePost($postId){ // tar bort ett inlägg från database
        $this->deleteImage($postId);        
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("DELETE FROM posts WHERE postId = :postId");
        $stmt->bindParam(":postId", $postId);
        $stmt->execute();    
    }

    public function deleteImage($postId){
        $image = $this->getImageName($postId);        
        unlink("../writeable/images/" . $image["images"]); // https://www.php.net/manual/en/function.unlink.php                        
    }

    public function deleteAllImages($userId){       
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT images FROM posts WHERE usersId = :userId");
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();               
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)) { // hämtar namnet för en bild för att veta vilken bild från filsystemet som ska raderas 
            unlink("../writeable/images/" . $result["images"]);
        }
    }    

    private function getImageName($postId){        
        $db = new Database;
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT images FROM posts WHERE postId = :postId");
        $stmt->bindParam(":postId", $postId);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $result;
    }   

}


?>

