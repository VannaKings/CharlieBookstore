<?php
//Importa o start-mysql para iniciar o banco de dados
include '../start-mysql.php';
//Inicia sessão
session_start();

//Recebe dados do login via POST
$email = $_POST["email"];
$senha = $_POST["senha"];


//Seleciona os administradores 
$admins = $pdo->query("SELECT ADM_EMAIL, ADM_SENHA, ADM_ATIVO, ADM_NOME FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'");


$linha = $admins->fetch(PDO::FETCH_ASSOC);


//Checagem de autenticação do login
if(isset($linha) && $linha){
    
    $adminNome = $linha["ADM_NOME"];

    //Consulta se o adm está ativo
    $adminAtivo = $linha["ADM_ATIVO"];

    if(!$adminAtivo){
        $acesso = false;
        include 'login-adm.php';
    }
    else
    {
        $_SESSION["logado"] = true;
        $_SESSION["nome"] = $adminNome;       
        header('Location: ../Menu/home.php');
    }
}
else
{
    $acesso = false;
    include 'login-adm.php';
}
