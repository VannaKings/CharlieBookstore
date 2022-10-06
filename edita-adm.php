<?php
    include 'start-mysql.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(isset($_POST['ativo'])){
        $ativo = 1;
    }
    else{
        $ativo = 0;
    }
    
    
    $cmd = $pdo->prepare("UPDATE ADMINISTRADOR SET ADM_NOME = :nome, ADM_EMAIL = :email, ADM_SENHA = :senha, ADM_ATIVO = :ativo WHERE ADM_ID = :id");
    $cmd->bindValue(":nome", $nome);
    $cmd->bindValue(":email", $email);
    $cmd->bindValue(":senha", $senha);
    $cmd->bindValue(":ativo", $ativo);
    $cmd->bindValue(":id", $id);
    
    if($nome && $email && $senha){
        $cmd->execute();
        header('Location: edita-adm-sucesso.php');
        echo "$nome  e $senha  e $email $id";
    }
    else{
        header('Location: edita-adm-erro.php'); 
    }
    
    
    
        
    
    

    
    