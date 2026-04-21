/* 
Skapare: Erik Hägglund
Kurs: DT058G
Datum: 2025-06-02
Breif: En när användaren vill logga ut, radera konto eller inlägg.


*/

document.addEventListener("DOMContentLoaded", function(){

    let logOut = document.getElementById("logout"); // värdet på logout knappen
    if(logOut){
        logOut.onclick = function(){
            let message = "Are you sure you want to log out?";
            if(confirm(message) == true){ //https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_confirm3
                location.replace("login.php");                        
            }   
        }
    }
   
    let deleteAcc = document.getElementById("deleteAcc"); // När användaren klickar på delete Account länken
    if(deleteAcc){
        deleteAcc.addEventListener("click", function(e){
            
            let message = "Are you sure you want to delete you Account?";
            if(confirm(message) == true){ //https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_confirm3
                location.replace(this.href); // vid ok skicka användaren dit länken ledde. 
            }
            else{
                e.preventDefault(); // annars avbryt
            }
            
        })
    }

    let deletePost = document.getElementsByClassName("deletePost"); // om användaren klickar på en av deletePost länkarna
    if(deletePost){
        for (let index = 0; index < deletePost.length; index++) { // loopa igenom inläggen för att komma till den som det klickats på
            deletePost[index].addEventListener("click", function(e){                
                let message = "Are you sure you want to delete this post?";
                if(confirm(message) == true){ //https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_confirm3
                    location.replace(this.href);
                }
                else{
                    e.preventDefault();
                }    
            })
        }
    }
    



});