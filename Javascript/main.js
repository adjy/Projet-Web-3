function addMenu(){
    let categorie= document.querySelectorAll('.categorieRecettes');
    let Mn = document.getElementById("menu")
    categorie.forEach((menu, indice) => {
        // menu.setAttribute('id', "ID_"+ menu.children[0].innerHTML.split(" ").join(""));
        // let test = "    aaaa";
        // console.log();

        // console.log(menu.children[0].innerHTML);
    let new_node = document.createElement('a');
    let text_n = menu.children[0].innerHTML.split(" ").join("");
    // console.log(text_n)
    new_node.innerHTML = text_n;

    new_node.classList.add("item-menu");
    let lienText = "#ID_"+text_n;
    new_node.href = lienText
    // console.log(new_node);

    Mn.append(new_node);
    // console.log(menu.children[0]);
    let lienIdText = "ID_"+text_n;
    menu.children[0].setAttribute('id', lienIdText)
    })
}

{/* <a class = " item-menu" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>">sale</a> */}

function soumissionRecette(){
    let recettes_form = document.querySelectorAll('.recette-index');

    recettes_form.forEach((recette, indice) => {

        recette.addEventListener("click", function(event){
            recette.submit()
        })
    })
}
document.addEventListener('DOMContentLoaded',function (){

   // addMenu();
    soumissionRecette();

})