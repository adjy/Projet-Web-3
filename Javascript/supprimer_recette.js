document.addEventListener('DOMContentLoaded',function (){
    let buttons = document.querySelectorAll('.btn-suppID'); // recupere le bouton a supprimer
    console.log(buttons);
   
    buttons.forEach((button, indice) => {
        let text = button.innerHTML; // recupere le text initial
        button.addEventListener("mousemove", function(event){
            button.innerHTML = "&#x1F5D1;"; // change le text en code de poubelle
        })
        button.addEventListener("mouseout", function(event){
            button.innerHTML = text;
        })
    })
    
})