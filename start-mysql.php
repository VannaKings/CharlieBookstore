<?php
    //Guarda as informações do banco de dados
    $mysqlhostname = "144.22.244.104";
    $mysqlport = "3306";
    $mysqlusername = "CharlieB";
    $mysqlpassword = "CharlieB";
    $mysqldatabase = "CharlieBookstore";

    //Mostra a string de conexão do mySQL
    $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;

    //Configura o banco de dados
    $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);