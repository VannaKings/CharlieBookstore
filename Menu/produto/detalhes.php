<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../CSS/menu.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0169495cc4.js" crossorigin="anonymous"></script>
    
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">


<body>
    <?php 
      //Inicia o banco de dados
      include "../../query-selector.php";
      //Pega as querys realizadas
      require_once "../../Login/autentica-login.php";

      
    ?>

    <!-- Menu -->
    <section class="menu">
        <!-- Logo -->
        <figure class="logo">
            <img src="../../imgs/logoCharlie.png" alt="">
        </figure>
        <!-- Perfil -->
        <div class="perfil">
            <img src="../../imgs/user.png" alt="imagem de perfil">
            <p class="nome">
                <?php
                echo $_SESSION["nome"];
                ?>
            </p>
            <p class="cargo">Administrador</p>
        </div>
        <div class="navegador-principal">
                <!-- Navegador Perfil -->
            <div class="icons">
                <i class="fa-solid fa-house" style="color:#ed8863;"></i>                
                <i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i>
            </div>
                <!-- Nav com data-filter -->     
            <nav class="nav-perfil nav">  
                <a class="filtro" href="../home.php">Home</a>          
                <a href="../../logout-adm.php">Sair</a>
            </nav>            
        </div>
        <h1>Navegador</h1>
        <div class="navegador-secundario">
            <!-- Navegador Funções -->
            <div class="icons">
                <i class="fa-solid fa-gear" style="color:#1195d3;"></i>
                <i class="fa-solid fa-list" style="color:#4ed5a3;"></i>
                <i class="fa-solid fa-book" style="color:#4e4ed5;"></i>
            </div>
                <!-- Nav com data-filter -->
            <nav class="nav-funcoes nav">
                <a class="filtro" href= "../admin/admin.php">Configuração</a>
                <a class="filtro" href= "../categoria/categoria.php">Categorias</a>
                <a class="filtro" href= "produto.php">Produtos</a>
            </nav>
        </div>
    </section>
    
    <!-- Bootstrap (com style dentro em algumas tags) -->
    <main class="conteudo">
      <div class="conteudo">
        <nav class="navegador navbar navbar-expand-lg" style="background-color: #61cdff;">
          <!-- Nav com data-filter -->
          <div class="nav  navbar navbar-expand-lg ">
              <a class="nav-link" href= "../home.php" style="color: white; font-size: 22px;">Home</a>
              <a class="nav-link" href= "../admin/admin.php" style="color: white; font-size: 22px;">Administração</a>
              <a class="nav-link" href= "../categoria/categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>
      
      <!-- Seção Produtos -->

      <section class= "secao-principal produtos secao-produtos">
        <h1>Produtos</h1>
        <h3>Adicione ou edite produtos já existentes do seu site.</h3>
        <div class="img-produtos">
            <img class="img-principal" src="" alt="">
            <ul class="img-list">
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
                <li><img src="" alt=""></li>
            </ul>
        </div>
      </section>
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src= "../../JavaScript/filtro.js"></script>
<script src= "../../JavaScript/editar-produto.js"></script>
</html>