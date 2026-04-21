<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Metadatat för login och createAccount
-->


<?php include("siteinfo.php");
session_start(); // Skickas direkt från javascripten
if(isset($_SESSION["username"])){ // ser till så att det inte går att skriva index.php i url
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?=  $site_title . $divider . $pageTitle;  ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
    <!-- <script src="js/AccountValidation.js"></script> -->    
</head>
<body>



    <div id="container">
        <header id="mainheader">                                    
        </header>
    </div>
<!-- <body>
<html> -->