<?php
//Inclui o começo do banco de dados
include '../start-mysql.php';

//Salva as informações enviadas via POST
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//Checa se o ativo está selecionado
if(isset($_POST['ativo'])){
    $ativo = 1;
}
else{
    $ativo = 0;
}

//Prepare o update dos dados
$cmd = $pdo->prepare("UPDATE ADMINISTRADOR SET ADM_NOME = :nome, ADM_EMAIL = :email, ADM_SENHA = :senha, ADM_ATIVO = :ativo WHERE ADM_ID = :id");

//Substitui os dados pelos dados que foram enviados por POST
$cmd->bindValue(":nome", $nome);
$cmd->bindValue(":email", $email);
$cmd->bindValue(":senha", $senha);
$cmd->bindValue(":ativo", $ativo);
$cmd->bindValue(":id", $id);

//Valida a entrada do usuário
if($nome && $email && $senha){
    $cmd->execute();
    header('Location: edita-sucesso.php');
}
else{
    header('Location: edita-erro.php'); 
}
    
    
    
        
    
    

    
    