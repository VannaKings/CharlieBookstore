<?php

include "../start-mysql.php";

//Pegando o Input do usuário
$nome = $_POST['nome'];

$preco = $_POST['preco'];
$desconto = $_POST['desconto'];
$estoque = $_POST['estoque'];

//Verificando se a descrição está vazia
if($_POST['desc']){
    $desc = $_POST['desc'];
}
else{
    $desc = "Descrição pendente";
}

//Checando o status do checkbox
if(isset($_POST['ativo'])){
    $ativo = 1;
    
}
else{
    $ativo = 0;
}

//Prepara o insert
$cmdtext = "INSERT INTO PRODUTO(PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO) 
VALUES('" . $nome . "','" . $desc . "', '" . $preco . "','" . $desconto . "','" . $ativo . "')";
$cmd = $pdo->prepare($cmdtext);


//Checa se o nome tiver algo e executa 
if($nome == 'não execute ainda, precisa colocar categoria'){
    $cmd->execute();    
    header('Location: edita-sucesso.php');
}
else{
    header('Location: edita-erro.php'); 
}


