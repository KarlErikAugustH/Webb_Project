<!-- 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: Här är sidan som visas när ett inlägg skapas
-->

<?php
$pageTitle = "Create Post";
include("includes/header.php");
include_once("classes/PostManager.php");
?>

<!-- <body> -->
    <h1> Create Post </h1>

    <?php
        if(isset($_POST["publish"])){ // vid publicering av inlägg                            
           
            if (isset($_FILES["fileName"]) && $_FILES["fileName"]["error"] == 1) { // https://www.php.net/manual/en/reserved.variables.files.php
                
                header("Location: create.php?signup=sizeError");
                exit;
            }
            else { 
                echo "hej";           
                $title = $_POST["inpTitle"];
                $text = $_POST["inpText"];
                $image = $_FILES["fileName"];
                $postManager = new PostManager;
                $postManager->createPost($title, $text, $image);
                header("Location: index.php");
                exit;  
            }        
        }        

    ?>

    <div id="postCreator">            
        <form method="POST" enctype="multipart/form-data">
            <label for="titleId"> Title </label>
            <input type="text" id="titleId" name="inpTitle" placeholder="Enter your title">
            <label for="textId"> Text content </label>
            <textarea name="inpText" id="textId" placeholder="Enter your text here"></textarea>
            <label for="img"> Select image file </label>
            <input type="file" name="fileName" id="img" accept="image/*">
            <input type="submit" id="publishId" name="publish" value="publish">
        </form>
    </div>
    <?php
        if(!isset($_GET["signup"])){
            exit();
        }
        else{
            $signupCheck = $_GET["signup"];
            if($signupCheck == "empty"){
                echo "<p class='error'>You did not fill in all the fields!</p>";
                exit();
            }
            elseif ($signupCheck == "sizeError") {
                echo "<p class='error'>Max file size is 2MB</p>";
            }
        }
    ?>        
<body>
</html>