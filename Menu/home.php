<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0169495cc4.js" crossorigin="anonymous"></script>
    
    <!-- Font Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Jquery -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>

<body>
    <?php 
      //Inicia o banco de dados
      include "../query-selector.php";
      //Pega as querys realizadas
      session_start();

      // Se existir a marcacao de estar logado
      if(isset($_SESSION["logado"]) == false) {
          header("Location: ../Login/login-adm.php");
      }
    ?>

    <!-- Menu -->
    <section class="menu">
        <!-- Logo -->
        <figure class="logo">
            <img src="../imgs/logoCharlie.png" alt="">
        </figure>
        <!-- Perfil -->
        <div class="perfil">
            <img src="../imgs/user.png" alt="imagem de perfil">
            <p class="nome">
                <?php
                echo $_SESSION["nome"];
                ?>
            </p>
            <p class="cargo">Administrador</p>
        </div>
        <!-- Navegador Perfil -->   
        <ul class="nav-vertical">  
            <li style="background-color:#ed8863;"><i class="fa-solid fa-house" style="color:white;"></i><a class="filtro" style="color:white;" href="home.php">Home</a></li>          
            <li><i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i><a href="../logout-adm.php">Sair</a></li>
        </ul>    
        <h1>Navegador</h1>        
        <!-- Nav se????es -->
        <ul class="nav-vertical">
            <li><i class="fa-solid fa-gear" style="color:#1195d3;"></i><a class="filtro" href= "admin/admin.php">Configura????o</a></li>
            <li><i class="fa-solid fa-list" style="color:#4ed5a3;"></i><a class="filtro" href= "categoria/categoria.php">Categorias</a></li>
            <li><i class="fa-solid fa-book" style="color:#4e4ed5;"></i><a class="filtro" href= "produto/produto.php">Produtos</a><li>
        </ul>
    </section>
    
    <!-- Bootstrap (com style dentro em algumas tags) -->
    <main class="conteudo">
      <div class="conteudo">
        <nav class="navegador navbar navbar-expand-lg" style="background-color: #61cdff;">
          <!-- Nav com data-filter -->
          <div class="nav  navbar navbar-expand-lg ">
              <a class="nav-link nav1" href= "home.php" style="color: white; font-size: 22px;">Home</a>
              <a class="nav-link" href= "admin/admin.php" style="color: white; font-size: 22px;">Administra????o</a>
              <a class="nav-link" href= "categoria/categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "produto/produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>

      <!-- Home -->

      <section class="secao-principal home">
        <div class="container-alinhamento">
        <h1>Acesso Administrativo</h1>
        <h3>Veja quais s??o os principais acessos administrativos dispon??veis para organizar seu site.</h3>
        <div class="funcoes">
          <div class="card navegador">
            <img src="../imgs/categoria.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Organize suas categorias</h5>
              <p class="card-text">Adicione, edite ou exclua categorias existentes no seu site</p>
              <a href="categoria/categoria.php" class="btn btn-primary" style="background-color: #ed8863; border-color: #ed8863; color: white;" data-filter="categorias">Organizar categorias</a>
            </div>
          </div>
          <div class="card navegador">
            <img src="../imgs/livros.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Customize seus Produtos</h5>
              <p class="card-text">Personalize a visualiza????o dos seus produtos ou adicione novos</p>
              <a href="produto/produto.php" class="btn btn-primary" style="background-color: #ed8863; border-color: #ed8863; color: white;" data-filter="produtos">Editar produtos</a>
            </div>
          </div>
          <div class="card navegador">
            <img src="../imgs/book-and-coffee.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Edite os Administradores</h5>
              <p class="card-text">Adicione ou edite informa????es de outros administradores</p>
              <a href="admin/admin.php" class="btn btn-primary" data-filter="configuracao" style="background-color: #ed8863; border-color: #ed8863; color: white">Configurar admins</a>
            </div>
          </div>
        </div>
        </div>
      </section>
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src= "../JavaScript/filtro.js"></script>
<script src= "../JavaScript/load.js"></script>
</html>