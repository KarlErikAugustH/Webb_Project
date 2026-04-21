<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: About sidan som ger en liten kort beskrivning av sidan.
-->

<?php
$pageTitle = "About";
include("includes/loginHeader.php");

?>
<nav id="mainmenu">
    <ul>               
        <li><a id="cteateAccount" href="createAccount.php"> Create Account</a></li>
        <li><a id="login" href="login.php"> Login</a></li> 
    </ul>
</nav>


<h1> About </h1>

<div class="middle">
    <p> Välkommen till denna bloggsida här har du möjlighet att skapa ett konto och publicera inlägg.<br>
        Du har även möjlighet att söka på andra användare för att läsa deras inlägg.<br>
        För att skapa konto klickar du på Create Account i menyn. Om du redan har ett konto välj login.<br>                
    </p>
</div>


</body>

</html>