<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Denna fil innehåller endast funktioner för att skriva ut på sidan
-->


<?php


function printMyPost($userPost){    // skriver ut användaren egna inlägg på home sidan
    foreach($userPost as $row){               
        echo "<article class='postId'>";
        echo "<h2>". $row["title"] . "</h2>" . "<br>";
        if($row["images"]){        
        echo "<img alt='' src='../writeable/images/" . rawurlencode($row["images"]) . "'>" . "<br>"; //rawurlencode ser till strängen följer RFC 3986 standard 
        //vilket i mitt fall ser till att url inte ser mellanslag eller tecken som å, ä, ö.
        //https://stackoverflow.com/questions/61808950/w3c-validation-failed-illegal-character-in-path-segment-space-is-not-allowed
        }   
        echo "<p>" . $row["texts"] . "</p>" . "<br>" ;
        echo "<p class='dateId'>" . $row["postDate"] . "</p>";  
        echo "<a class='deletePost' href='index.php?delPost=" . $row["postId"] ."'>Delete Post</a>";                
        echo "</article>";    
    }
}

function printUserPost($userPost){ // skriver ut en användare som någon har sökt på
    foreach($userPost as $row){               
        echo "<article class='postId'>";
        echo "<h2>". $row["title"] . "</h2>" . "<br>";
        if($row["images"]){        
            echo "<img alt='' src='../writeable/images/" . rawurlencode($row["images"]) . "'>" . "<br>";           
        }
        echo "<p>" . $row["texts"] . "</p>" . "<br>" ;
        echo "<p class='dateId'>" . $row["postDate"] . "</p>";         
        echo "</article>";    
    }  
}

function printUsers($users){ // skriver ut användarna som mathar en sökterm
    $check = false;
    foreach ($users as $row) {
        $tmpUsername = $row["username"];
        if($tmpUsername != $_SESSION["username"]){
            $check = true; // kontroll om vi får matchning
            echo "<section class='middle'>";
                echo "<ul><li>
                    <form action='search.php' method='POST'>
                        <input type='hidden' name='usersName' value ='$tmpUsername'>
                        <input type='submit' name='submitUser' value='$tmpUsername'>
                    </form>
                    </li></ul>";
            echo "</section>";
        }        
        
    }
    if(!$check){    
        echo "<div class='middle'>";
        echo "<p> No matching users found</p>";
        echo "</div>";    
    }
}



?>