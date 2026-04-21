<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Post Id representerar ett post objekt
-->


<?php

class Post{
    private $title;
    private $text;
    private $image = [];
    private $dateTime;

    public function __construct($title, $text, $image){
        $this->title = $title;
        $this->text = $text;        
        $this->image = $image;
        $this->dateTime = date("Y-m-d G:i:s");
    }

    public function getTitle(){
        return $this->title;
    }
    
    public function getText(){
        return $this->text;
    }
    
    public function getImage(){
        return $this->image;
    }
    
    public function getDate(){
        return $this->dateTime;
    }
    
    
    
   

    // public function search($username){ // användare ska kunna söka icke casesensitive på en annan användare
    //     include("includes/dbh.php");
    //     $username = "%$username%";
    //     $query = $conn->prepare("SELECT * FROM users WHERE username LIKE :username");
    //     $query->bindParam(":username", $username);
    //     $query->execute();
        
        
        
        
    //     while($row = $query->fetch(PDO::FETCH_ASSOC)){
    //         $tmpUserName =  $row["username"];
    //        // if($row["username"] != $_SESSION["username"]){
    //             echo "<div class='middle'>";
    //                 echo "<ul>
    //                         <form action='search.php' method='POST'>
    //                             <input type='hidden' name='usersName' value ='$tmpUserName'>
    //                             <input type='submit' name='submitUser' value='$tmpUserName'>
    //                         </form>
                            
    //                     </ul>";
    //             echo "</div>";
    //         //}
    //     }

    //     // <li><a href='search.php'>" . $tmpUserName ."</a></li>        

    // }


    // public function getUserPost($username){
    //     include("includes/dbh.php");       
    //         echo "hej";
    //         $query = $conn->prepare("SELECT * FROM posts JOIN users ON posts.usersId = users.userId WHERE users.username =:username");
    //         $query->bindParam(":username", $username);
    //         $query->execute();            
    //         echo $username;
    //         while($row = $query->fetch(PDO::FETCH_ASSOC)){               
    //             echo "<div id='postId'>";
    //             echo $row["title"] . "<br>";
    //                 echo "<img width='20%' height='20%' src='images/" . $row["images"]. "'>" . "<br>";
    //                 echo $row["texts"] . "<br>" ;
    //             echo "</div>";
    //         }//code...
        
        
    // }



    // include("includes/dbh.php");           
    //         $query = $conn->prepare("INSERT INTO users(username, pwd) VALUES (:username, :pwd)");
    //         $query->bindParam(':username', $username);
    //         $query->bindParam(':pwd', $passWords);           
    //         $query->execute();
    //         header("Location: login.php?signup=succeed");    


}

// starta en session där userId hämtas och lagras i sessionen
// för då vet vi vilken användare som är äger inlägget!
// när en användare klickas på spars det

?>