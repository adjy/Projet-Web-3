function addMenu(){
    let categorie = document.querySelectorAll('.categorieRecettes');
    let Mn = document.getElementById('menu');
    // console.log(menu);

    categorie.forEach((menu, indice) => {
    // console.log(menu.children[0].innerHTML);
    let new_node = document.createElement('a');
    let text_n = menu.children[0].innerHTML;
    new_node.innerHTML = text_n;

    new_node.classList.add("item-menu");
    let lienText = "#ID_"+text_n;
    new_node.href = lienText
    // console.log(new_node);

    Mn.append(new_node);
    console.log(menu.children[0]);
    let lienIdText = "ID_"+text_n;
    menu.children[0].setAttribute('id', lienIdText)
    })
}

{/* <a class = " item-menu" href="<?php echo $GLOBALS['DOCUMENT_DIR'] ?>">sale</a> */}


document.addEventListener('DOMContentLoaded',function (){
//    addMenu();

})