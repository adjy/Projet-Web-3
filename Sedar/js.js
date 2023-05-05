

let formulaire = undefined
let display = undefined

let httpRequest = new XMLHttpRequest()
httpRequest.onreadystatechange = function (){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            let response = JSON.parse(httpRequest.response)

            // display.innerHTML = response.firstname
            let select = document.getElementById("choixIngredients")
            var option = document.createElement("option");
            option.text = response.nomIngredient;
            // option.value = "4";
            select.options.add(option);

            console.log(select);



        } else {
            alert('ERREUR avec la requête.');
        }
    }
}

document.addEventListener('DOMContentLoaded', function (){

    formulaire = document.getElementById("ajout-ingredient-form")
    // display = document.querySelector("#ajax-post-02")

    formulaire.addEventListener('submit', function (event){

        event.preventDefault() // bloquer le comportement par défaut du submit

        // s'ils existent, on peut récupérer la méthode et l'action (url) sur les attributs du form
        let method = formulaire.getAttribute("method")
        let url = "execution.php"
        httpRequest.open(method, url)

        // constructeur avec le formulaire en paramètre
        let data = new FormData(formulaire)
        // il faut que les noms des champs du formulaire correspondent à ce qu'attend le serveur !

        // data.append('lastname', 'Bourguin')



        httpRequest.send(data)

    })

    ajoutIngredients();
})

function ajoutIngredients(){
    let ingredientBtn = document.getElementById("ajout-ingre")

    let form = document.getElementById("ajout-recette-form");
    let liste = document.getElementById('listeIngredient'); //Recupere la liste des ingredients


    ingredientBtn.addEventListener("click", function(event) {
        let name = document.getElementById("choixIngredients");
        let  qte = document.getElementById("qte");
        let unite = document.getElementById("unite");
        let idNom = document.getElementById("choixIngredients")

        var monObjet = {id: idNom.value, unite: unite.value, quantite:qte.value};

        let nodeIngredients = document.createElement("input"); // creation d'un input
        nodeIngredients.name = "ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodeIngredients.value=JSON.stringify(monObjet) ; // donne comme valeur la valeur de nom
        nodeIngredients.type = "hidden"; // met le input a hidden pour ne pas l'afficher
        form.append(nodeIngredients)

            let divNode = document.createElement("div");
            divNode.classList.add("ingredientClass");


            let divNom = document.createElement("div")
            let  divunite = document.createElement("div")
            let divqte  = document.createElement("div")

        divNom.innerText = name.options[name.selectedIndex].text;
        divunite.innerHTML = unite.value;
        divqte.innerHTML = qte.value;
        divNode.append(divNom);
        divNode.append(divunite);
        divNode.append(divqte);


        // name.value = "";
        unite.value = "";
        qte.value = "";

        liste.append(divNode);
    //
    //     event.defaultPrevented;
    })
    //
    // // Pour la creation des divs pour afficher la liste des ingredients
    //
    // //
    // boutonIngredient.addEventListener("click", function(event){
    //     // pour le nom de l'ingredient
    //     let nom = document.getElementById("nom-ingredient"); // recupre le nom du formulaire
    //     if(nom.value === "") // Verifie si le nom n'est pas vide
    //         return;
    //





    // })
}