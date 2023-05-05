
let formulaire = undefined
let display = undefined

let httpRequest = new XMLHttpRequest()
httpRequest.onreadystatechange = function (){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            let response = JSON.parse(httpRequest.response)

            // display.innerHTML = response.firstname
            console.log(response);


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
        let url = formulaire.getAttribute("action")
        httpRequest.open(method, url)

        // constructeur avec le formulaire en paramètre
        let data = new FormData(formulaire)
        // il faut que les noms des champs du formulaire correspondent à ce qu'attend le serveur !

        // data.append('make', 'Ford')
        // data.append('lastname', 'Bourguin')


        httpRequest.send(data)

    })


})