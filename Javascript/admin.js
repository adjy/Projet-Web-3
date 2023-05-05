

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


function rehercher() {
    let nom_ingredient = document.getElementById("nom-ingredient")
    let mot = nom_ingredient.value;
    let liste = document.getElementById("choixIngredients");
    let btn = document.getElementById("ajout-ingre")
    let tmp = false;
    let mess = document.getElementById("erreur-ingredient");


    let option = liste.getElementsByTagName("option");
    for (let i = 0; i < option.length; i++) {
        if (option[i].innerHTML.trim() === mot.trim()) {
            option[i].style.display = "";
            tmp = true;
        }
        else
            option[i].style.display = "none";
    }
    if(!tmp  ) {
        btn.style.display = "none"
        mess.style.display = "";
    }
    else {
        btn.style.display = ""
        mess.style.display = "none";
    }
    if(mot ===""){
        btn.style.display = ""
        mess.style.display = "none";
    }


}

function rehercherTag() {
    let nom_tag = document.getElementById("nom-tag")
    let mot = nom_tag.value;
    let liste = document.getElementById("choixTags");
    let btn = document.getElementById("ajout-tag")
    let tmp = false;
    let mess = document.getElementById("erreur-tag");


    let option = liste.getElementsByTagName("option");
    for (let i = 0; i < option.length; i++) {
        if (option[i].innerHTML.trim() === mot.trim()) {
            option[i].style.display = "";
            tmp = true;
        } else
            option[i].style.display = "none";
    }
    if (!tmp) {
        btn.style.display = "none"
        mess.style.display = "";
    } else {
        btn.style.display = ""
        mess.style.display = "none";

    }
    if(mot ===""){
        btn.style.display = ""
        mess.style.display = "none";
    }
}
function ajoutTag(){

    let boutonTag = document.getElementById("ajout-tag-form");
    let form = document.getElementById("ajout-recette-form");
    let nom;

    boutonTag.addEventListener("click", function(event) {

        nom = document.getElementById("nom-tag");
        let idNom = document.getElementById("choixTags")


        var monObjet = {id: idNom.value};

        let nodeTag = document.createElement("input"); // creation d'un input
        nodeTag.name = "tag[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodeTag.value=JSON.stringify(monObjet) ; // donne comme valeur la valeur de nom
        nodeTag.type = "hidden"; // met le input a hidden pour ne pas l'afficher
        form.append(nodeTag)
        event.defaultPrevented;
    })

    // Pour la creation des divs pour afficher la liste des ingredients

    let liste = document.getElementById('listeTags'); //Recupere la liste des ingredients
    //
    boutonTag.addEventListener("click", function(event){
        // pour le nom de l'ingredient

        let divNom = document.createElement("div");
        divNom.classList.add("tagClass");
        divNom.innerHTML = nom.value;


        nom.value = "";


        liste.append(divNom);

    })
}
function updateNom(){
    // let nom_ingredient = document.getElementById("nom-ingredient")
    // let liste = document.getElementById("choixIngredients");
    // let opt = liste.getElementsByTagName("option")
    // liste.addEventListener("click", function(event) {
    // for(let i=0; i< opt.length; i++)
    //     if(opt[i].selected)
    //         nom_ingredient.value = opt[i].innerHTML;
    // })
}
function ajoutTags(){
    // Pour la creation des divs pour afficher la liste des tags

    let boutonTags= document.getElementById("ajouter-tag-button"); // recupere le button tag
    let liste = document.getElementById('listeTags'); //Recupere la liste des tags


    boutonTags.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-tag"); // recupre le nom du tag
        if(nom.value === "") // verifie si le nom est vide
            return;

        let divNodeNom = document.createElement("div");
        divNodeNom.innerHTML =  nom.value;
        nom.value = "";
        divNodeNom.classList.add("tagClass");
        liste.append(divNodeNom);
    })

}

function submitRecette(){
    let form = document.getElementById("ajout-recette-form") ;
    let button = document.getElementById("ajout-recette")

    button.addEventListener('click', function (e){
        form.submit()
    })
}


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

    })

}

document.addEventListener('DOMContentLoaded',function (){
console.log(1)
    formulaire = document.getElementById("ajout-ingredient-form")

    formulaire.addEventListener('submit', function (event){

        event.preventDefault() // bloquer le comportement par défaut du submit

        // s'ils existent, on peut récupérer la méthode et l'action (url) sur les attributs du form
        let method = formulaire.getAttribute("method")
        let url = formulaire.getAttribute("action")
        httpRequest.open(method, url)

        // constructeur avec le formulaire en paramètre
        let data = new FormData(formulaire)
        // il faut que les noms des champs du formulaire correspondent à ce qu'attend le serveur !
        httpRequest.send(data)

        ajoutIngredients();


    })
















    // let mess = document.getElementById("erreur-ingredient");
    // mess.style.display = "none";
    // let mess2 = document.getElementById("erreur-tag");
    // mess2.style.display = "none";

    // ajoutIngredients();
    // ajoutTag();
    // ajoutTags()
    // updateNom();
    // submitRecette();
    // ajoutTags();

})