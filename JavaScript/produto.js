//Categorias e produtos
const navProduto = document.querySelectorAll(".filter-categoria a");
console.log(navProduto)
const produtos = document.querySelectorAll(".card-produto");

filtro(navProduto, produtos);


//Função filtro

function filtro(navs, divs) {

    //Adicionando o EventListener em cada nav
    navs.forEach(nav => 
    {
        nav.addEventListener("click", (event) => 
        {
            event.preventDefault();

            //Pegando o data-filter do nav
            const filter = event.target.dataset.filter;

            //Filtrando cada div que deve aparecer de acordo com o filter
            divs.forEach((div) => {
                if(filter == "todos"){
                    div.style.display = "flex";
                }
                else{
                    if(div.classList.contains(filter)){
                    div.style.display = "flex";
                    }
                    else{
                        div.style.display = "none";
                    }
                }
            })
        })
    })
}

//Detalhes - Imagens
let imgs = Array.from(document.querySelectorAll(".imgs"));
let imgDestaque = document.querySelector(".img-principal");

imgs.forEach(img => {
    img.addEventListener("click", mudarImagem)
});

function mudarImagem(){
    let src = this.getAttribute("src");
    imgDestaque.setAttribute("src", src)
}