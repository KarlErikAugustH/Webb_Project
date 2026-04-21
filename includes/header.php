<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Här finns metadatan för alla filer
-->

<?php 
include("siteInfo.php");
include("checkSession.php");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $site_title . $divider . $pageTitle; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
    <script src="js/script.js"></script>
</head>
<body>
    <div id="container">        
        <header id="mainheader">
            <?php include("mainmenu.php"); ?>            
        </header>
    