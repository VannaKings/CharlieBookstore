//Pegando os input
let id = document.getElementById('idProduto');
let titulo = document.querySelector('.inputTitulo');
let preco = document.querySelector('.inputPreco');
let desconto = document.querySelector('.inputDesconto');
let estoque = document.querySelector('.inputEstoque');
let desc = document.querySelector('.inputDesc');


//Pegando os valores da lista de produtos e armazenando em um array
let idLista = Array.from(document.getElementsByClassName("idProduto"));
let tituloLista = Array.from(document.getElementsByClassName("titulo"));
let estoqueLista = Array.from(document.getElementsByClassName("estoque"));
let descLista = Array.from(document.getElementsByClassName("desc"));
let precoLista = Array.from(document.getElementsByClassName("preco"));
let descontoLista = Array.from(document.getElementsByClassName("desconto"));

let button = Array.from(document.getElementsByClassName("btn-editar-produto"));


//Chamando a função em todos os botões e atribuindo a chave de cada um com o index do array
button.forEach((element, index) => {
    element.setAttribute("chave", index);
    element.addEventListener("click", showEdit);
});

//Realiza a função addValor em todos os inputs e usando o index do botão como referencia aos outros index
function showEdit(){

    let index = this.getAttribute("chave");

    addValor(tituloLista[index],titulo);
    addValor(estoqueLista[index],estoque);
    addValor(descLista[index],desc)


    addValor(descontoLista[index],desconto)
    addValor(precoLista[index],preco);
    addValor(idLista[index],idProduto);
}

//Coloca no input o valor do array que irá ser editado
function addValor(array,input){
    input.value = array.innerText;
}
