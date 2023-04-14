let boutonIngredient= document.getElementById("ajouter-ingredient-button");

let liste = document.getElementById('listeIngredient');
boutonIngredient.addEventListener("click", function(event){
    
    // pour le nom de l'ingredient
    let nom = document.getElementById("nom-ingredient"); // recupre le nom du formulaire
    if(nom.value === "")
        return;
    // let nodeNom = document.createElement("input"); // creation d'un input
    // nodeNom.name = "nom-ingredient[]"; // ajoute ce nom dans la liste de name nom-ingredient
    // nodeNom.value = nom.value; // donne comme valeur la valeur de nom
    // nodeNom.type = "hidden"; // met le input a hidden pour ne pas l'afficher
    let divNodeNom = document.createElement("div");
    divNodeNom.innerHTML =  nom.value;
    // liste.append(nodeNom);
    nom.value = "";
    console.log(nom)
   

    // divNodeNom.classList.add("aff-ingredient");

    // pour la qte
    let qte = document.getElementById("qte"); // recupre le nom du formulaire
    // let nodeqte = document.createElement("input"); // creation d'un input
    // nodeqte.name = "quantite[]"; // ajoute ce nom dans la liste de name nom-ingredient
    // nodeqte.value = qte.value; // donne comme valeur la valeur de nom
    // nodeqte.type = "hidden"; // met le input a hidden pour ne pas l'afficher
    let divNodeQte = document.createElement("div");
    divNodeQte.innerHTML =  qte.value;
    // liste.append(nodeqte);
    qte.value="";
    //
    //
    // //pour l'unite
    let unite = document.getElementById("unite"); // recupre le nom du formulaire
    // let nodeunite = document.createElement("input"); // creation d'un input
    // nodeunite.name = "unite[]"; // ajoute ce nom dans la liste de name nom-ingredient
    // nodeunite.value = unite.value; // donne comme valeur la valeur de nom
    // nodeunite.type = "hidden"; // met le input a hidden pour ne pas l'afficher
    let divNodeUnite = document.createElement("div");
    divNodeUnite.innerHTML =  unite.value;
    // liste.append(nodeunite);
    unite.value="";
   //
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
   //
   //
   liste.append(divIngredient);

    
})

document.addEventListener("DOMContentLoaded", function (event){
    let form = document.getElementById("ajout-recette-form") ;
    let button = document.getElementById("ajout-recette")

    button.addEventListener('click', function (e){
        form.submit()
    })

})