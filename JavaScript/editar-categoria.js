//Pegando os input
let id = document.getElementById('idCategoria');
let nome = document.querySelector('.inputNome');
let desc = document.querySelector('.inputDesc');


//Pegando os valores da tabela e armazenando em um array
let idTabela = Array.from(document.getElementsByClassName("id-tabela"));
let nomeTabela = Array.from(document.getElementsByClassName("nome-tabela"));
let descTabela = Array.from(document.getElementsByClassName("desc-tabela"));

let button = Array.from(document.getElementsByClassName("btn-selecionar-editar"));



//Chamando a função em todos os botões e atribuindo a chave de cada um com o index do array
button.forEach((element, index) => {
    element.setAttribute("chave", index);
    element.addEventListener("click", showEdit);
});

//Realiza a função addValor em todos os inputs
function showEdit(){

    let index = this.getAttribute("chave");

    addValor(nomeTabela[index],nome);
    addValor(descTabela[index],desc);

    
    addValor(idTabela[index],id);
    
}

//Coloca no input o valor do array que irá ser editado
function addValor(array,input){
    input.value = array.innerText.trim();
    // console.log(array.innerText.trim());
}

