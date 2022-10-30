//Pegando os input
let idCategoria = document.getElementById('idCategoria');
let nomeCategoria = document.querySelector('.inputNomeCategoria');
let descCategoria = document.querySelector('.inputDesc');


//Pegando os valores da tabela e armazenando em um array
let idTabelaCategoria = Array.from(document.getElementsByClassName("id-categoria-tabela"));
let nomeTabelaCategoria = Array.from(document.getElementsByClassName("nome-categoria-tabela"));
let descTabelaCategoria = Array.from(document.getElementsByClassName("desc-categoria-tabela"));

let buttonCategoria = Array.from(document.getElementsByClassName("btn-selecionar-editar-categoria"));



//Chamando a função em todos os botões e atribuindo a chave de cada um com o index do array
buttonCategoria.forEach((element, index) => {
    element.setAttribute("chave", index);
    element.addEventListener("click", showEdit);
});

//Realiza a função addValor em todos os inputs
function showEdit(){

    let index = this.getAttribute("chave");

    addValor(nomeTabelaCategoria[index],nomeCategoria);
    addValor(descTabelaCategoria[index],descCategoria);

    
    addValor(idTabelaCategoria[index],idCategoria);
    
}

//Coloca no input o valor do array que irá ser editado
function addValor(array,input){
    input.value = array.innerText.trim();
    // console.log(array.innerText.trim());
}

