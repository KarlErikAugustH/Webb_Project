<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: När användaren använder säkfunktionen kommer resultatet att visas på denna sida.
-->



<?php
include("includes/header.php");
include("classes/AccountManager.php");
include_once("classes/PostManager.php");
include("func/printFunc.php");


if(isset($_POST["search"])){ // vid sökning
    $searchTerm = $_POST["searchBar"];
    $accountManager = new AccountManager;
    $users = $accountManager->userSearch($searchTerm);
    printUsers($users);
}
else if(isset($_POST["submitUser"])){    // vid val av användare 
    $username =  $_POST["usersName"];   
    $postManager = new PostManager;    
    $userPost = $postManager->getUserPost($username);
    printUserPost($userPost);    
}
?>