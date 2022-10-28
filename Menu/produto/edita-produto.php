<?php

include "../../start-mysql.php";

//Pegando o Input do usuário
$nome = $_POST['nome'];
$id = $_POST['id'];

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

//Prepara o update
$cmd = $pdo->prepare("UPDATE PRODUTO SET PRODUTO_NOME = :nome, PRODUTO_DESC = :descricao, PRODUTO_PRECO = :preco, PRODUTO_DESCONTO = :desconto, PRODUTO_ATIVO = :ativo, CATEGORIA_ID = :categoria WHERE PRODUTO_ID = :id");

//Substituição de valores para realizar o update
$cmd->bindValue(":nome", $nome);
$cmd->bindValue(":descricao", $desc);

$cmd->bindValue(":preco", $preco);
$cmd->bindValue(":desconto", $desconto);
$cmd->bindValue(":categoria", $categoria);

$cmd->bindValue(":ativo", $ativo, PDO::PARAM_BOOL);
$cmd->bindValue(":id", $id);

//Checa se o nome tiver algo e executa o Uptade
if($nome){
    $cmd->execute();
}
else{
    $editado = false; 
    include 'produto.php';
}

$cmd2 = $pdo->prepare("UPDATE PRODUTO_ESTOQUE SET PRODUTO_QTD = :estoque WHERE PRODUTO_ID = :id");
$cmd2->bindValue(":id", $id);
$cmd2->bindValue(":estoque", $estoque);

if($cmd2->execute()){ 
    $editado = true;
    include 'produto.php';
}
else{
    $editado = false; 
    include 'produto.php';
}
