<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/menu-adm.css">
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

      // Realiza uma Query SQL para buscar o administrador que tenha o email e a senha passado pelo usuário
      $admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL = '" . $email . "' AND ADM_SENHA = '" . $senha . "'")->fetchAll();
      $adminNome = $pdo->query("SELECT ADM_NOME FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();
      $adminAtivo = $pdo->query("SELECT ADM_ATIVO FROM ADMINISTRADOR  WHERE ADM_EMAIL = '" . $email . "'")->fetch();

      $cmd = $pdo->query("SELECT * FROM ADMINISTRADOR") ;

      if($adminAtivo[0] == false || count($admin) == 0){
        header('Location: login-adm-erro.html');
      }
  ?>
    <section class="menu">
        <!-- Logo -->
        <figure class="logo">
            <img src="imgs/logoCharlie.png" alt="">
        </figure>
        <!-- Perfil -->
        <div class="perfil">
            <img src="imgs/user.png" alt="imagem de perfil">
            <p class="nome"><?php
                echo "$adminNome[0]";
            ?></p>
            <p class="cargo">Administrador</p>
        </div>
        <div class="navegador">
             <!-- Navegador Perfil -->
            <div class="icons">
                <i class="fa-solid fa-user-gear" style="color:violet ;"></i>
                <i class="fa-solid fa-gear" style="color:#1195d3;"></i>
                <i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i>
            </div>
             <!-- Nav com data-filter -->     
            <ul class="nav-perfil nav">                      
                <li class="filtro">Perfil</li>                
                <li class="filtro" data-filter="configuracao">Configuração</li>
                <li><a href="login-adm.html">Sair</a></li>
            </ul>            
        </div>
        <h1>Navegador</h1>
        <div class="navegador" id="navegador2">
            <!-- Navegador Funções -->
            <div class="icons">
                <i class="fa-solid fa-house" style="color:#ed8863;"></i>
                <i class="fa-solid fa-list" style="color:#4ed5a3;"></i>
                <i class="fa-solid fa-book" style="color:#4e4ed5;"></i>
            </div>
             <!-- Nav com data-filter -->
            <ul class="nav-funcoes nav">
                <li class="filtro" data-filter="home">Home</li>
                <li class="filtro">Categorias</li>
                <li class="filtro">Produtos</li>
            </ul>
        </div>
    </section>
    <!-- Bootstrap (com style dentro em algumas tags) -->
    <main class="conteudo">
      <nav class="navegador navbar navbar-expand-lg" style="background-color: #61cdff;">
        <a class="navbar-brand" href="#" style="color: white; font-size:24px;">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse navegador" id="navbarSupportedContent">
          <!-- Nav com data-filter -->
          <nav class="nav  navbar-nav mr-auto ">
              <a class="nav-link filtro" href="#" style="color: white;" data-filter="home">Home</a>
              <a class="nav-link" href="#" style="color: white;">Perfil</a>            
              <nav class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color: white;"id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Site
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </nav>
          </nav>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="color:white; "><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
      </nav>

      <!-- Home -->

      <section class="secao-principal home">
        <h1>Acesso Administrativo</h1>
        <h3>Veja quais são os principais acessos administrativos disponíveis para organizar seu site.</h3>
        <div class="funcoes">
          <div class="card">
            <img src="imgs/categoria.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Organize suas categorias</h5>
              <p class="card-text">Adicione, edite ou exclua categorias existentes no seu site</p>
              <a href="#" class="btn btn-primary" style="background-color: #ed8863; border-color: #ed8863;">Organizar categorias</a>
            </div>
          </div>
          <div class="card">
            <img src="imgs/livros.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Customize seus Produtos</h5>
              <p class="card-text">Personalize a visualização dos seus produtos ou adicione novos</p>
              <a href="#" class="btn btn-primary" style="background-color: #ed8863; border-color: #ed8863;">Editar produtos</a>
            </div>
          </div>
          <div class="card">
            <img src="imgs/book-and-coffee.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Edite os Administradores</h5>
              <p class="card-text">Adicione ou edite informações de outros administradores</p>
              <a href="#" class="btn btn-primary" style="background-color: #ed8863; border-color: #ed8863;">Configurar admins</a>
            </div>
          </div>
        </div>
    </section>

    <!-- Configuração -->

    <section class= "secao-principal configuracao">
      <h1>Configuração</h1>
      <h3>Crie, exclua ou atualize dados de outros administradores</h3>
      <table class="table table-striped table-hover" id="tabela">
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Adm ativo</th>
            <th>Editar</th>
            <th>Excluir</th>
          </tr>
          <?php
              //Lista os Admins
            while($linha = $cmd->fetch())
            { 
          ?>
          <tr>
            <td>
              <?php
                echo $linha["ADM_NOME"];         
              ?>
            </td>
            <td>
              <?php
                echo $linha["ADM_EMAIL"];         
              ?>
            </td>
              <?php
                if($linha["ADM_ATIVO"])
                {
                  echo '<td class="table-success">Sim</td>';                  
                }
                else
                {
                  echo '<td class="table-danger">Não</td>';
                }                                        
              ?>
              <td><i class="fa-solid fa-pen-to-square"></i></td>
              <td><i class="fa-solid fa-trash"></i></td>                      
            </tr>
          <?php
            } //while($linha = $cmd->fetch());
          ?> 
      </table>
      <button class="btn-adicionar-adm"><i class="fa-solid fa-user-plus"></i>Adicionar administrador</button>
    </section>
    <section class="secao-adicionar">
      <div class="container">
        <h1>Cadastro</h1>
        <form class="form-adm">
          <div class="form-group">
            <label for="inputAddress">Nome</label>
            <input type="text" class="form-control nome" id="inputName" placeholder="Nome">
          </div>
          <div class="form-row">
            <div class="email form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>          
            <div class="senha form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>                 
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Administrador ativo
              </label>
            </div>
          </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
      </div>
    </section>
    </main>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="single-pag.js"></script>
</html>