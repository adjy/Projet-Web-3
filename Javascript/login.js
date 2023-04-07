

document.addEventListener('DOMContentLoaded',function (){
    
    let form = document.getElementById("login-formID");

    form.addEventListener("submit", function(e){
        let username = document.getElementById("username");
        let password = document.getElementById("password");
        let erreur = document.getElementById("erreur-log");
    
        if (username.value.trim()==""){
            erreur.innerHTML ="USERNAME IS EMPTY";
            e.preventDefault();
           
        }
        else if (password.value.trim()==""){
            erreur.innerHTML = "PASSWORD IS EMPTY";
            e.preventDefault(); 
        }
        

    })
 
 })