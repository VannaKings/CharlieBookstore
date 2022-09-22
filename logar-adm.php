<?php
    include 'start-mysql.php';
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    setcookie('email', $_POST["email"], time()+3600);
    setcookie('senha', $_POST["senha"], time()+3600);
    $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetchAll();
    $adminNome = $pdo->query("SELECT ADM_NOME FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();
    setcookie('nome', $adminNome[0],time()+3600);
    $adminAtivo = $pdo->query("SELECT ADM_ATIVO FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();
    
    if($adminAtivo[0] == false || count($admin) == 0){
        header('Location: login-adm-erro.html');
    }
    else{
        header('Location: menu-adm.php');
    }