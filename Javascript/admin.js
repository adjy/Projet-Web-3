function ajoutIngredientSucces(response){
    /*ajout dans l'ingredient dans la liste deroulante */
    let select = document.getElementById("choixIngredients")
    let option = document.createElement("option");
    option.text = response.nomIngredient;
    option.value = response[1].idIngredient;
    select.options.add(option);
    alert("l'ingredient a ete ajoute")
}

function ajoutcategoriesSucces(response){
    let listecategorie = document.getElementById("listeCategorie");

    // Creation de nouveau node

    let nodeFormCheck = document.createElement("div");
    nodeFormCheck.classList.add("form-check");
    let nodeCheckBox = document.createElement("input");
    nodeCheckBox.type = "checkbox";
    nodeCheckBox.classList.add("form-check-input");
    nodeCheckBox.classList.add("check");
    nodeCheckBox.id = response[1].idCategorie;
    nodeCheckBox.value =  response[1].idCategorie;
    nodeCheckBox.name = "categorie[]";

    let nodeLabel = document.createElement("label");
    nodeLabel.classList.add("form-check-label")
    nodeLabel.htmlFor =  response.nomCategorie;
    nodeLabel.innerHTML =  response.nomCategorie;

    nodeFormCheck.append(nodeCheckBox)
    nodeFormCheck.append(nodeLabel)
    listecategorie.append(nodeFormCheck);

    alert("La categorie a ete ajoutee");
}

function createCategorie(){
    let httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function (){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                let response = JSON.parse(httpRequest.response)
               ajoutcategoriesSucces(response);
            } else {
                alert('ERREUR avec la requête.');
            }
        }
    }
    let formulaire = document.getElementById("ajout-categorie-form")

    formulaire.addEventListener('submit', function (event) {

        event.preventDefault() // bloquer le comportement par défaut du submit

        // s'ils existent, on peut récupérer la méthode et l'action (url) sur les attributs du form
        let method = formulaire.getAttribute("method")
        let url = formulaire.getAttribute("action")
        httpRequest.open(method, url)

        // constructeur avec le formulaire en paramètre
        let data = new FormData(formulaire)

        formulaire.firstElementChild.nextElementSibling.firstElementChild.value =  "";
        httpRequest.send(data)
    })

}
function ajoutIngredients(){
    let ingredientBtn = document.getElementById("ajout-ingre") // recupere le bouton ajout

    let form = document.getElementById("ajout-recette-form"); // recupere le formulaire d'ajout de recette
    let liste = document.getElementById('listeIngredient'); //Recupere la liste des ingredients


    ingredientBtn.addEventListener("click", function(event) {
        /*recupere les informations */
        let name = document.getElementById("choixIngredients");
        let  qte = document.getElementById("qte");
        let unite = document.getElementById("unite");
        let idNom = document.getElementById("choixIngredients")

        /* Creation d'un objet d'ingredient */
        let monIngredient = {id: idNom.value, unite: unite.value, quantite:qte.value};

        let nodeIngredients = document.createElement("input"); // creation d'un input
        nodeIngredients.name = "ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodeIngredients.value=JSON.stringify(monIngredient) ; // donne comme valeur la valeur de nom
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

        unite.value = "";
        qte.value = "";

        liste.append(divNode);
    })
}

function createIngredient(){
    let httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function (){
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                let response = JSON.parse(httpRequest.response)
                ajoutIngredientSucces(response) // action a faire si la requette a ete un succes
            }
            else
                alert('ERREUR avec la requête.');
        }
    }

    let formulaire = document.getElementById("ajout-ingredient-form")

    formulaire.addEventListener('submit', function (event){

        event.preventDefault() // bloquer le comportement par défaut du submit

        // s'ils existent, on peut récupérer la méthode et l'action (url) sur les attributs du form
        let method = formulaire.getAttribute("method")
        let url = formulaire.getAttribute("action")
        httpRequest.open(method, url)

        // constructeur avec le formulaire en paramètre
        let data = new FormData(formulaire)
        // il faut que les noms des champs du formulaire correspondent à ce qu'attend le serveur !
        // let nom = formulaire.getElementById("nom-ingredient");
        // nom.innerText = "";
        formulaire.children[1].firstElementChild.value = "";
        formulaire.children[1].firstElementChild.nextElementSibling.nextElementSibling.value = "";

        httpRequest.send(data)
    })
}

document.addEventListener('DOMContentLoaded',function (){
    createIngredient();

    ajoutIngredients();
    createCategorie();


})


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

function reherchercategorie() {
    let nom_categorie = document.getElementById("nom-categorie")
    let mot = nom_categorie.value;
    let liste = document.getElementById("choixcategories");
    let btn = document.getElementById("ajout-categorie")
    let tmp = false;
    let mess = document.getElementById("erreur-categorie");


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


function updateNom(){
    // let nom_ingredient = document.getElementById("nom-ingredient")
    // let liste = document.getElementById("choixIngredients");
    // let opt = liste.getElementsBycategorieName("option")
    // liste.addEventListener("click", function(event) {
    // for(let i=0; i< opt.length; i++)
    //     if(opt[i].selected)
    //         nom_ingredient.value = opt[i].innerHTML;
    // })
}
function ajoutcategories(){
    // Pour la creation des divs pour afficher la liste des categories

    let boutoncategories= document.getElementById("ajouter-categorie-button"); // recupere le button categorie
    let liste = document.getElementById('listecategories'); //Recupere la liste des categories


    boutoncategories.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-categorie"); // recupre le nom du categorie
        if(nom.value === "") // verifie si le nom est vide
            return;

        let divNodeNom = document.createElement("div");
        divNodeNom.innerHTML =  nom.value;
        nom.value = "";
        divNodeNom.classList.add("categorieClass");
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

