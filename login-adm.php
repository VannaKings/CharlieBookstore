<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/login-adm.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0169495cc4.js" crossorigin="anonymous"></script>
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
<body>
    <?php
        setcookie('nome', ' ',time()+3600);
    ?>
    <section class="formulario">
        <!-- Login -->
        
        <form action="menu-adm.php" method="POST">
            <div class="logo">
                <img src="imgs/logoCharlie.png" alt="" id="img-logo">
            </div>
            <h1 class="login-title">Acesso Admin</h1>
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
        <!-- Redefinir senha -->
        <div class="redefinir">
            <a href="">Redefinir senha</a>
        </div>
        <!-- Voltar para o site -->
        <div class="voltar">
            <i class="fa-solid fa-left-long"></i>
            <a href=""> Voltar para o site </a>
        </div>
    </section>
</body>
</html>