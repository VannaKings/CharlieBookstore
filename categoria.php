<?php
    $nome = $_POST["nome"];
    
    if($_POST['desc']){
        $desc = $_POST["desc"];
    }
    else{
        $desc = 'Descrição pendente';
    }
    // if(isset($_POST["ativo"])){
    //     $ativo = 1;
    //     echo "ativo = 1";
    // }else{
    //     $ativo = 0;
    //     echo "ativo = 0";
    // }

    //echo "$nome e $desc";

    include 'start-mysql.php';

    $cmdtext = "INSERT INTO CATEGORIA(CATEGORIA_NOME, CATEGORIA_DESC) VALUES('" . $nome . "','" . $desc . "')";
    $cmd = $pdo->prepare($cmdtext);
    

    //Executa o comando e verifica se teve sucesso
    $isInputEmpty = $nome;

    if($isInputEmpty){
        $status = $cmd->execute();
        echo "Inserido com sucesso";
        //header('Location: menu-adm.php');
    } 
    else{
        echo "Ocorreu um erro ao inserir";
        //header('Location: menu-adm-erro.php');
    }
    echo "<a href = 'criar-categoria.php'>Voltar</a>";