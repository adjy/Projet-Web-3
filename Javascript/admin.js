function ajoutIngredients(){

    let boutonIngredient = document.getElementById("ajout-ingre");
    let form = document.getElementById("ajout-recette-form");
    let nom, unite, qte;

    boutonIngredient.addEventListener("click", function(event) {

          nom = document.getElementById("nom-ingredient");
         unite = document.getElementById("unite")
         qte = document.getElementById("qte")
        let idNom = document.getElementById("choixIngredients")

        var monObjet = {id: idNom.value, unite: unite.value, quantite:qte.value};

        let nodeIngredients = document.createElement("input"); // creation d'un input
        nodeIngredients.name = "ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodeIngredients.value=JSON.stringify(monObjet) ; // donne comme valeur la valeur de nom
        nodeIngredients.type = "hidden"; // met le input a hidden pour ne pas l'afficher
        form.append(nodeIngredients)

        event.defaultPrevented;
    })

    // Pour la creation des divs pour afficher la liste des ingredients

    let liste = document.getElementById('listeIngredient'); //Recupere la liste des ingredients
    //
    boutonIngredient.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-ingredient"); // recupre le nom du formulaire
        if(nom.value === "") // Verifie si le nom n'est pas vide
            return;

        let divNode = document.createElement("div");
        divNode.classList.add("ingredientClass");


        let divNom = document.createElement("div")
        let  divunite = document.createElement("div")
        let divqte  = document.createElement("div")


        divNom.innerText = nom.value;
        divunite.innerHTML = unite.value;
        divqte.innerHTML = qte.value;
        divNode.append(divNom);
        divNode.append(divunite);
        divNode.append(divqte);

        nom.value = "";
        unite.value = "";
        qte.value = "";

        liste.append(divNode);

    })
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

    let boutonTag = document.getElementById("ajout-tag");
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

document.addEventListener('DOMContentLoaded',function (){
    /*let mess = document.getElementById("erreur-ingredient");
    mess.style.display = "none";
    let mess2 = document.getElementById("erreur-tag");
    mess2.style.display = "none";
*/
    ajoutIngredients();
    ajoutTag();
    // ajoutTags()
    // updateNom();
    submitRecette();
    // ajoutTags();

})