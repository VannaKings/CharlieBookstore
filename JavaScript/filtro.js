const navProduto = document.querySelectorAll(".filter-categoria a");
console.log(navProduto)
const produtos = document.querySelectorAll(".card-produto")

for (i = 0; i < navProduto.length; i++) {
    
    navProduto[i].addEventListener("click", (event) => {
        event.preventDefault();

        const filter = event.target.dataset.filter;
        console.log(filter)
        produtos.forEach((produto) => {
            if(filter == "todos"){
                produto.style.display = "flex"
            }
            else{
                if(produto.classList.contains(filter)){
                produto.style.display = "flex"
                }
                else{
                    produto.style.display = "none"
                }
            }            
        })
    })
}

