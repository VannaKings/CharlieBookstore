<?php
    $mysqlhostname = "144.22.244.104";
    $mysqlport = "3306";
    $mysqlusername = "CharlieB";
    $mysqlpassword = "CharlieB";
    $mysqldatabase = "CharlieBookstore";

    //Mostra a string de conexão do mySQL
    $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
    $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);


    $id = $_POST['id'];
    $ativo = $_POST['ativo'];
    $cmd = $pdo->prepare("UPDATE ADMINISTRADOR SET ADM_ATIVO = :ativo WHERE ADM_ID = :id");
    if($ativo == 1){
        $cmd->bindValue(":ativo", 0);
    }
    else{
        $cmd->bindValue(":ativo", 1);
    }
    
    $cmd->bindValue(":id",$id);
    
    $cmd->execute();
    echo "Update executado com sucesso";
    // header('Location: menu-adm.php');