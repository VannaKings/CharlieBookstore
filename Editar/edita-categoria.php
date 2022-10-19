<?php

include "../start-mysql.php";

//Pegando o Input do usuário
$nome = $_POST['nomeCategoria'];
$id = $_POST['idCategoria'];

//Verificando se a descrição está vazia
if($_POST['desc']){
    $desc = $_POST['desc'];
}
else{
    $desc = "Descrição pendente!";
}

//Checando o status do checkbox
if(isset($_POST['ativo-categoria'])){
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
$cmd->bindValue(":ativo", $ativo);
$cmd->bindValue(":id", $id);

//Checa se o nome tiver algo e executa o Uptade
if($nome){
    $cmd->execute();
    header('Location: edita-sucesso.php');
}
else{
    header('Location: edita-erro.php'); 
}


