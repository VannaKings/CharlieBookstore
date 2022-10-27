<?php

include "../start-mysql.php";

//Pegando o Input do usuário
$nome = $_POST['nome'];

$preco = $_POST['preco'];
$desconto = $_POST['desconto'];
$estoque = $_POST['estoque'];
$categoria = $_POST['categoria'];

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
$query = $pdo->prepare("INSERT INTO PRODUTO(PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO, PRODUTO_DESCONTO, PRODUTO_ATIVO, CATEGORIA_ID) 
VALUES(:nome, :descricao, :preco, :desconto, :ativo, :categoria)");

$query->bindValue(":nome", $nome);
$query->bindValue(":descricao", $desc);

$query->bindValue(":preco", $preco);
$query->bindValue(":desconto", $desconto);

$query->bindValue(":categoria", $categoria, PDO::PARAM_INT);
$query->bindValue(":ativo", $ativo, PDO::PARAM_BOOL);

$query->execute();

$id = $pdo->lastInsertId();

$cmd = $pdo->prepare("INSERT INTO PRODUTO_ESTOQUE(PRODUTO_ID, PRODUTO_QTD) 
VALUES('" . $id . "', '" . $estoque . "')");

//Checa se o nome tiver algo e executa 
if($cmd->execute()){    
    header('Location: criar-sucesso.php');
}
else{
    header('Location: criar-erro.php'); 
}


