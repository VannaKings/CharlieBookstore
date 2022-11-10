let imgs = Array.from(document.querySelectorAll(".imgs"));
let imgDestaque = document.querySelector(".img-principal");

imgs.forEach(img => {
    img.addEventListener("click", mudarImagem)
});

function mudarImagem(){
    let src = this.getAttribute("src");
    imgDestaque.setAttribute("src", src)
}