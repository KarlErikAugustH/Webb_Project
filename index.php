<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Index.php fungerar som en startsida eller Home. Hit kommer användaren efter en lyckad inloggning
-->


<?php
$pageTitle = "Home";
include("includes/header.php");



echo "<aside class='rightCorner'>";

    echo "<form method='POST'>";
    echo "<button type='button' id='logout'>" . "Log out" . "</button>";              
    echo "</form>";
    echo "<br> Logged in as: " . $_SESSION["username"] . "<br>";
    echo "<a id='deleteAcc' href ='index.php?delAcc=yes'>Delete Account</a>";
echo "</aside>";



include ("classes/PostManager.php");
include ("func/printFunc.php");
include("classes/AccountManager.php");
$postManager = new PostManager;
$userPost = $postManager->getUserPost($_SESSION["username"]);
printMyPost($userPost);


// if(isset($_POST["logout"])){   // vid logout
     
//     $authenticator = new Authenticator;
//     $authenticator->logOut();
//     echo "hej";
//     header("Location: login.php");
//     exit;
// }


if(isset($_GET["delPost"])){   // vid delete post
    $postId = $_GET["delPost"];
    $postManager = new PostManager;
    $postManager->deletePost($postId);
    header("Location: index.php");
}
else if(isset($_GET["delAcc"])){    // vid delete acc
    $del = $_GET["delAcc"];
    if($del == "yes"){
        $accountManager = new AccountManager;
        $accountManager->deleteAccount();
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
}

?>

</div>