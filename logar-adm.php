<?php
    //Importa o start-mysql para iniciar o banco de dados
    include 'start-mysql.php';

    //Recebe dados do login via POST
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Cria cookies das informações de login
    setcookie('email', $_POST["email"], time()+3600);
    setcookie('senha', $_POST["senha"], time()+3600);
    
    //Seleciona os administradores 
    $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetchAll();
    $adminNome = $pdo->query("SELECT ADM_NOME FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();

    $adminSenha = $pdo->query("SELECT ADM_SENHA FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "'")->fetch();

    //Cria um cookie do nome do usuário
    setcookie('nome', $adminNome[0],time()+3600);

    //Consulta se o adm está ativo
    $adminAtivo = $pdo->query("SELECT ADM_ATIVO FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();
    
    //Checagem de autenticação do login
    if($adminAtivo[0] == false || count($admin) == 0){
        header('Location: login-adm-erro.html');
    }
    else{
        //Checa a senha
        if($adminSenha[0] == $senha){
            header('Location: menu-adm.php');
        }
        else{
            var_dump($adminSenha);
        }
        
    }