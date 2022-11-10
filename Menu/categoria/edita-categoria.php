<?php

include "../../start-mysql.php";

//Pegando o Input do usuário
$nome = $_POST['nome'];
$id = $_POST['id'];

//Verificando se a descrição está vazia
if($_POST['desc']){
    $desc = $_POST['desc'];
}
else{
    $desc = "Livros de $nome";
}

//Checando o status do checkbox
if(isset($_POST['ativo'])){
    $ativo = 1;
    
}
else{
    $ativo = 0;
}

//Prepara o update
$cmd = $pdo->prepare("UPDATE CATEGORIA SET CATEGORIA_NOME = :nome, CATEGORIA_DESC = :descricao, CATEGORIA_ATIVO = :ativo WHERE CATEGORIA_ID = :id");

//Substituição de valores para realizar o update
$cmd->bindValue(":nome", $nome);
$cmd->bindValue(":descricao", $desc);
$cmd->bindValue(":ativo", $ativo, PDO::PARAM_BOOL);
$cmd->bindValue(":id", $id);

//Checa se o nome tiver algo e executa o Uptade
if($nome){
    $cmd->execute(); 
    $editado = true; 
    include 'categoria.php';
}
else{
    $editado = false; 
    include 'categoria.php';
}


