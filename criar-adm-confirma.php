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
                include 'start-mysql.php';

                //Captura o post do usuário
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                
                
                //Monta o comando de inscrição
                $cmdtext = "INSERT INTO ADMINISTRADOR(ADM_NOME, ADM_EMAIL, ADM_SENHA) VALUES('" . $nome . "','" . $email . "','" . $senha . "')";
                $cmd = $pdo->prepare($cmdtext);

                //Executa o comando e verifica se teve sucesso
                $isInputEmpty = $nome && $email && $senha

                if($isInputEmpty){
                    $status = $cmd->execute();
                } 
                else{
                    echo "Ocorreu um erro ao inserir";
                }

            ?>
</body>
</html>