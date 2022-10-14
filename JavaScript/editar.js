//Pegando os input
let id = document.getElementById('idAdm');
let nome = document.querySelector('.InputNome');
let email = document.querySelector('.InputEmail');
let senha = document.querySelector('.InputSenha');

//Pegando os valores da tabela e armazenando em um array
let idTabela = Array.from(document.getElementsByClassName("id-adm-tabela"));
let nomeTabela = Array.from(document.getElementsByClassName("nome-adm-tabela"));
let emailTabela = Array.from(document.getElementsByClassName("email-adm-tabela"));
let senhaTabela = Array.from(document.getElementsByClassName("senha-adm-tabela"));
let button = Array.from(document.getElementsByClassName("btn-selecionar-editar"));


//Chamando a função em todos os botões e atribuindo a chave de cada um com o index do array
button.forEach((element, index) => {
    element.setAttribute("chave", index);
    element.addEventListener("click", showEdit);
    console.log(element, index);
});

//Realiza a função addValor em todos os inputs
function showEdit(){

    let index = this.getAttribute("chave");

    addValor(nomeTabela[index],nome);
    addValor(emailTabela[index],email);

    addValor(senhaTabela[index],senha);
    addValor(idTabela[index],id);
}

//Coloca no input o valor do array que irá ser editado
function addValor(array,input){
    input.value = array.innerText;
}


