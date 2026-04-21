<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Kontrollerar så att en användare är inloggad.
        Annars skickas dem tillbaka till log in sidan.
-->

<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit;
}
?>