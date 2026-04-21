<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Sidan för skapande av konto
-->


<?php
$pageTitle = "Create Account";
include("includes/loginHeader.php");
?>


<nav id="mainmenu">
    <ul>               
        <li><a id="aboutId" href="About.php"> About</a></li>
        <li><a id="login" href="login.php"> Login</a></li> 
    </ul>
</nav>

<h1> Create Account </h1>
<!-- s -->
<?php     
    include("classes/AccountManager.php");
    if(isset($_POST["createAcc"])){ // vid skapande av konto
        $username = $_POST["usrName"];
        $password = $_POST["passwrd"];        
        $accountmanager = new AccountManager;
        $accountmanager->createAccount($username, $password);
        header("Location: login.php?signup=succeed");
        exit;
    }   else {
?>
   
<div id="loginDiv"> 
    <form  method="post">
        <label for="name">Username</label>
        <input type="text" id="name" name="usrName" placeholder="Enter your username"/>
        <label for="pas">Password</label>
        <input type="password" id="pas" name="passwrd" placeholder="Enter your password"/>
        <input type="submit" name="createAcc" value="Create Account" />    
    </form>
</div>
<a id="link" href="login.php"> Sign in </a>


<?php

    }
    if(!isset($_GET["signup"])){
        exit();
    }
    else{
        $signupCheck = $_GET["signup"];
        if($signupCheck == "empty"){
            echo "<p class='error'>You did not fill in all fields!</p>";
            exit();
        }
        elseif ($signupCheck == "taken") {
            echo "<p class='error'>Username already taken!</p>";
            exit();
        }
       
    }



?>