<?php
include '../../start-mysql.php';

//Captura o post do usuário
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];                

//Checando o checkbox
if(isset($_POST["ativo"]))
{
    $ativo = 1;
}
else
{
    $ativo = 0;
}

//Monta o comando de inscrição
$cmdtext = "INSERT INTO ADMINISTRADOR(ADM_NOME, ADM_EMAIL, ADM_SENHA, ADM_ATIVO) VALUES('" . $nome . "','" . $email . "','" . $senha . "','" . $ativo . "')";
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$isInputEmpty = $nome && $email && $senha;

if($isInputEmpty){
    $status = $cmd->execute();
    $cadastrado = true;
    include 'admin.php';
} 
else{
    $cadastrado = false;
    include 'admin.php';
}

    
