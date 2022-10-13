<?php
    $nome = $_POST["nome"];
    
    if($_POST['desc']){
        $desc = $_POST["desc"];
    }
    else{
        $desc = 'Descrição pendente';
    }

    include 'start-mysql.php';

    $cmdtext = "INSERT INTO CATEGORIA(CATEGORIA_NOME, CATEGORIA_DESC) VALUES('" . $nome . "','" . $desc . "')";
    $cmd = $pdo->prepare($cmdtext);
    

    //Executa o comando e verifica se teve sucesso
    $isInputEmpty = $nome;

    if($isInputEmpty){
        $status = $cmd->execute();
        echo "Inserido com sucesso";
        header('Location: criar-adm-sucesso.php');
    } 
    else{
        echo "Ocorreu um erro ao inserir";
        header('Location: criar-adm-erro.php');
    }
    echo "<a href = 'criar-categoria.php'>Voltar</a>";