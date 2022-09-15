<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar adm</title>
</head>
<body>
<?php
                $mysqlhostname = "144.22.244.104";
                $mysqlport = "3306";
                $mysqlusername = "CharlieB";
                $mysqlpassword = "CharlieB";
                $mysqldatabase = "CharlieBookstore";

                //Mostra a string de conexão do mySQL
                $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
                $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

                //Captura o post do usuário
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                
                
                //Monta o comando de inscrição
                $cmdtext = "INSERT INTO ADMINISTRADOR(ADM_NOME, ADM_EMAIL, ADM_SENHA) VALUES('" . $nome . "','" . $email . "','" . $senha . "')";
                $cmd = $pdo->prepare($cmdtext);

                //Executa o comando e verifica se teve sucesso
                $status = $cmd->execute();
                if($status) {
                    echo "Criação do Administrador com sucesso";
                } 
                else{
                    echo "Ocorreu um erro ao inserir";
                }

            ?>
</body>
</html>