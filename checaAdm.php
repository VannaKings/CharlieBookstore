<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
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
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        
        //Realiza uma Query SQL para buscar o administrador que tenha o email e a senha passado pelo usuário
        $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetch();
        $adminNome = $pdo->query("SELECT ADM_NOME FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();
                          
        //Se o retorno for vazio (0), então a senha ou email estão incorretos
        if(count($admin) == 0){
            echo "Usuário ou senha inválidos";
        }
        else{
            echo "Usuário autenticado, Olá $adminNome[0]";
            
        }
    ?>
</body>
</html>
