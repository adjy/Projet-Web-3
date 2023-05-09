function modifierNom(){
    let pen = document.getElementById('pen_name');
    let formulaire = document.getElementById("modifierNom");
    Modifier(pen, formulaire);


}

function Modifier(pen, formulaire){
    pen.addEventListener("click", function(event){
        formulaire.style.zIndex = 6;
    })
    annuler(formulaire);
}
function imagesModifier(){
    let pen = document.getElementById('penImages');
    let formulaire = document.getElementById("modifierImage");
    Modifier(pen, formulaire)
}

function annuler(form){

    let buttons = document.querySelectorAll(".annulerBtn");
    buttons.forEach((btn) => {
        btn.addEventListener("click", function(event){
            form.style.zIndex = -1;
        })
    })
}

function modifierIngredient(){
    let pens = document.querySelectorAll('.ingredientsModifier');
    pens.forEach((pen) => {
        pen.addEventListener("click", function(event){
            Modifier(pen, pen.parentElement.parentElement.nextElementSibling)


        })


    })

}
document.addEventListener('DOMContentLoaded',function (){

   modifierNom();
    imagesModifier();
    modifierIngredient();


})