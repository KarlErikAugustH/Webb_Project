<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Log in sidan
-->


<?php

$pageTitle = "Log In ";
include("includes/loginHeader.php");

?>


<nav id="mainmenu">
    <ul>               
        <li><a id="aboutId" href="About.php"> About</a></li>
        <li><a id="createId" href="createAccount.php"> Create Account</a></li> 
    </ul>
</nav>

<h1> Log in to your account </h1>


<!-- <p> Här ska log in vara <p> -->
<?php
    include("classes/Authenticator.php");
    if(isset($_POST["login"])){ // vid login
        $userName = $_POST["usrName"];
        $passWord = $_POST["passwrd"];        
        $authenticator = new Authenticator;
        $authenticator->login($userName, $passWord);
        header("Location: index.php");
        exit();
    } else {
?>

<div id="loginDiv"> 
    <form method="post">
        <label for="name">Username</label>
        <input type="text" id="name" name="usrName" placeholder="Enter username"/>
        <label for="pas">Password</label>
        <input type="password" id="pas" name="passwrd" placeholder="Enter password"/>
        <input type="submit" name="login" value="Log in" />    
    </form>
</div>
<a id="link" href="createAccount.php"> Sign up </a>


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
        elseif ($signupCheck == "wrongPassword") {
            echo "<p class='error'>Wrong password!</p>";
            exit();
        }
        elseif($signupCheck == "wrongUser"){
            echo "<p class='error'>check your username or password!</p>";
            exit();
        }
        elseif ($signupCheck == "succeed") {          
            echo "<p class='succeed'>Account created !</p>";
            exit();
        }
    }

?>