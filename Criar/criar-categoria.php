<?php

include 'start-mysql.php';

$nome = $_POST["nome"];

if($_POST['desc']){
    $desc = $_POST["desc"];
}
else{
    $desc = 'Descrição pendente';
}

$cmdtext = "INSERT INTO CATEGORIA(CATEGORIA_NOME, CATEGORIA_DESC) VALUES('" . $nome . "','" . $desc . "')";
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$isInputEmpty = $nome;

if($isInputEmpty){
    $status = $cmd->execute();
    
    header('Location: criar-sucesso.php');
} 
else{
    
    header('Location: criar-erro.php');
}
    
