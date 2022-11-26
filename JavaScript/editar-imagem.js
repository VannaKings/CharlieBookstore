//Pegando os input
let id = document.getElementById('inputId');
let ordemInput = document.querySelector('.inputOrdem');
console.log(id, ordemInput)
//Pegando os valores da tabela e armazenando em um array
let idImagem = Array.from(document.getElementsByClassName("id"));
let ordem = Array.from(document.getElementsByClassName("ordem"));
let button = Array.from(document.getElementsByClassName("btn-editar-imagem"));

//Chamando a função em todos os botões e atribuindo a chave de cada um com o index do array
button.forEach((element, index) => {
    element.setAttribute("chave", index);
    element.addEventListener("click", showEdit);
});

//Realiza a função addValor em todos os inputs
function showEdit(){

    let index = this.getAttribute("chave");

    addValor(idImagem[index],id);
    addValor(ordem[index],ordemInput);    
    
}

//Coloca no input o valor do array que irá ser editado
function addValor(array,input){
    input.value = array.innerText.trim();
    // console.log(input);
}

