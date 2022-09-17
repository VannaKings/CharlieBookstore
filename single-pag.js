const nav = document.querySelectorAll(".navegador a");
const secoes = document.querySelectorAll(".secao-principal")

for (i = 0; i < nav.length; i++) {
    
    nav[i].addEventListener("click", (event) => {
        event.preventDefault();

        const filter = event.target.dataset.filter;
        //console.log(filter)
        secoes.forEach((secao) => {
            if(secao.classList.contains(filter)){
            secao.style.display = "flex"
            }
            else{
                secao.style.display = "none"
            }            
        })
    })
}