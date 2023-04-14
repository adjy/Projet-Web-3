function ajoutIngredients(){
    // Pour la creation des divs pour afficher la liste des ingredients
    let boutonIngredient= document.getElementById("ajouter-ingredient-button");  // Recupere le button
    let liste = document.getElementById('listeIngredient'); //Recupere la liste des ingredients

    boutonIngredient.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-ingredient"); // recupre le nom du formulaire
        if(nom.value === "") // Verifie si le nom n'est pas vide
            return;

        let divNodeNom = document.createElement("div");
        divNodeNom.innerHTML =  nom.value;
        nom.value = "";

        // pour la qte
        let qte = document.getElementById("qte"); // recupre le nom du formulaire
        let divNodeQte = document.createElement("div");
        divNodeQte.innerHTML =  qte.value;
        qte.value="";

        // //pour l'unite
        let unite = document.getElementById("unite"); // recupre le nom du formulaire
        let divNodeUnite = document.createElement("div");
        divNodeUnite.innerHTML =  unite.value;
        unite.value="";

        // pour la photo de l'ingredient
        let photo = document.getElementById("photo_ingredient"); // recupre le nom du formulaire
        let nodePhoto = document.createElement("file"); // creation d'un input
        nodePhoto.name = "photo_ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodePhoto.value = photo.value; // donne comme valeur la valeur de nom
        nodePhoto.type = "hidden"; // met le input a hidden pour ne pas l'afficher

        let divIngredient = document.createElement("div");// creation d'un div pour afficher l'ingredient ajouter
        divIngredient.append(divNodeNom);
        divIngredient.append(divNodeQte);
        divIngredient.append(divNodeUnite);

        divIngredient.classList.add("ingredientClass")

        liste.append(divIngredient);

    })
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
    // ajoutIngredients();
    submitRecette();
    // ajoutTags();

})