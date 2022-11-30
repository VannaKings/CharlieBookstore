<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/login.css">    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0169495cc4.js" crossorigin="anonymous"></script>
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
<body>
    <?php
        //Reinicia cookies
        setcookie('nome', '',time()-3600);
    ?>
    <section class="formulario">
        <!-- Login -->
        
        <form action="logar-adm.php" method="POST">
            <div class="logo">
                <img src="../imgs/logoCharlie.png" alt="" id="img-logo">
            </div>
            <h1 class="login-title">Acesso Admin</h1>
            <?php
                if(isset($acesso) && !$acesso)
                {
                    echo '<div class="alert alert-danger" role="alert">
                            Usuário ou senha inválidos
                         </div>';
                }
            ?>
            <div class="email">
                <p class="email-titulo">Email: </p>
                <input type="email" name="email" id="email">
            </div>
            <div class="senha">
                <p class="senha-titulo">Senha: </p>
                <input type="password" name="senha" id="password">
            </div>
            <input type="submit" value="Entrar" class="entrar">
        </form>
       
    </section>
</body>
</html>