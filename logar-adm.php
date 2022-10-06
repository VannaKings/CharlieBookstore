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
    $admin = $pdo->query("SELECT ADM_EMAIL, ADM_SENHA, ADM_ATIVO, ADM_NOME FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetchAll();
    $adminNome = $admin[0]["ADM_NOME"];

    //Cria um cookie do nome do usuário
    setcookie('nome', $adminNome,time()+3600);

    //Consulta se o adm está ativo
    $adminAtivo = $admin[0]["ADM_ATIVO"];

    //Checagem de autenticação do login
    if($adminAtivo != 1){
        header('Location: login-adm-erro.html');
    }
    else
    {
        header('Location: menu-adm.php');
    }
    