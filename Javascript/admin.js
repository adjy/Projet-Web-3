function ajoutIngredients(){
    let boutonIngredient= document.getElementById("ajouter-ingredient-button");

    let liste = document.getElementById('listeIngredient');
    boutonIngredient.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-ingredient"); // recupre le nom du formulaire
        if(nom.value === "")
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

        //  // pour la photo de l'ingredient
        let photo = document.getElementById("photo_ingredient"); // recupre le nom du formulaire
        let nodePhoto = document.createElement("file"); // creation d'un input
        nodePhoto.name = "photo_ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
        nodePhoto.value = photo.value; // donne comme valeur la valeur de nom
        nodePhoto.type = "hidden"; // met le input a hidden pour ne pas l'afficher


        let divIngredient = document.createElement("div");// creation d'un div pour afficher l'ingredient ajouter
        divIngredient.append(divNodeNom);
        divIngredient.append(divNodeQte);
        divIngredient.append(divNodeUnite);

        liste.append(divIngredient);

    })

}

function ajoutTags(){
    let boutonTags= document.getElementById("ajouter-tag-button");

    let liste = document.getElementById('listeTags');
    boutonTags.addEventListener("click", function(event){
        // pour le nom de l'ingredient
        let nom = document.getElementById("nom-tag"); // recupre le nom du formulaire
        if(nom.value === "")
            return;

        let divNodeNom = document.createElement("div");
        divNodeNom.innerHTML =  nom.value;
        nom.value = "";

        let divIngredient = document.createElement("div");// creation d'un div pour afficher l'ingredient ajouter
        divIngredient.append(divNodeNom);
        liste.append(divIngredient);

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

    ajoutIngredients();
    submitRecette();
    ajoutTags();

})