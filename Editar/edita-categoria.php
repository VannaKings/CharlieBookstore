<?php

include "../start-mysql.php";

$nome = $_POST['nome'];
$id = $_POST['id'];
//Se o 'desc' estiver vazio aparecerá a frase do else
if($_POST['desc']){
    $desc = $_POST['desc'];
}
else{
    $desc = "Descrição pendente!";
}

//Está checando se o checkbox está selecionado ou não, caso esteja selecionado é "setado" como true caso não, false
if(isset($_POST['ativo'])){
    $ativo = true;
}
else{
    $ativo = false;
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


