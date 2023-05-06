document.addEventListener('DOMContentLoaded',function (e){
    let buttons = document.querySelectorAll('.btn-supp'); // recupere le bouton a supprimer
    // console.log(buttons);
   
    buttons.forEach((button, indice) => {
        let text = button.innerHTML; // recupere le text initial
        button.addEventListener("mousemove", function(event){
            button.innerHTML = "&#x1F5D1;"; // change le text en code de poubelle
        })
        button.addEventListener("mouseout", function(event){
            button.innerHTML = text;
        })

        button.addEventListener("mousedown", function(event){
            if (confirm("Voulez-vous supprimer cette recette ?"))
                button.parentElement.nextElementSibling.submit();
        })

    })





})

function  suppression(e){
    // la boite de dialogue
    let recettes = document.querySelectorAll('.item-cadre');


    if (confirmation){
        console.log(recettes);
    }
        // return true;


    // Sinon, renvoyer false pour annuler la suppression
    else {
        window.location.href = "#";
    }
}

