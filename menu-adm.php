
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
      include "start-mysql.php";
      
      // Realiza uma Query SQL para buscar todos os administradores
      // $cmd = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL LIKE '%@fulano%'");
      $cmd = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL LIKE '%@charlie%'");
      
      if(!$_COOKIE['nome']){
        header('Location:login-adm-erro.html');
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
            <p class="nome">
              <?php
                include 'checa-login.php';
              ?>
            </p>
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
                <li><a href="login-adm.php">Sair</a></li>
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
              <th>Ativo</th>
              <th>Editar</th>
            </tr>
            <?php
                //Lista os Admins
              while($linha = $cmd->fetch())
              { 
            ?>
              <tr>
                <td class = "nome-adm-tabela">

                  <?php
                    echo $linha["ADM_NOME"];         
                  ?>
                </td>
                <td class = "email-adm-tabela">
                  <?php
                    echo $linha["ADM_EMAIL"];         
                  ?>
                </td>
                  <?php
                    if($linha["ADM_ATIVO"])
                    {
                      echo '<td class="ativo-adm-tabela"><i class="fa-solid fa-circle-check"></i></td>';                  
                    }
                    else
                    {
                      echo '<td class="ativo-adm-tabela"><i class="fa-solid fa-circle-exclamation"></i></td>';
                    }                                        
                  ?>
                  <td>
                    <?php                      
                      echo "<button type='button' class='btn btn-primary btn-selecionar-editar' style='background: none; border: none; padding: 0;'data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar'><i class='fa-solid fa-pen-to-square'></i></button>"; 
                    ?>
                  </td>
                  <td class = "senha-adm-tabela" style = "display:none;">
                    <?php
                      
                      echo $linha["ADM_SENHA"]; 
                    ?>
                  </td>
                  <td class = "id-adm-tabela" style = "display:none;">
                    <?php
                      echo $linha["ADM_ID"];
                    ?>
                  </td>                 
              </tr>            
            <?php
              } //while($linha = $cmd->fetch());
            ?> 
        </table>
        
        <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-plus"></i>Adicionar administrador</button>
        
        <!-- Modal Cadastro -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="form-adm" Action="criar-adm.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputAddress">Nome</label>
                    <input name="nome" type="text" class="form-control nome" id="inputName" placeholder="Nome" required>

                  </div>
                  <div class="form-row">
                    <div class="email form-group col-md-6">
                      <label for="inputEmail4">Email</label>

                      <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
                    </div>          
                    <div class="senha form-group col-md-6">
                      <label for="inputPassword4">Senha</label>
                      <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Senha" required>
                    </div>                 
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input"  name="ativo" type="checkbox" id="gridCheck">
                      <label class="form-check-label" for="gridCheck">
                        Administrador ativo
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-adicionar">Cadastrar</button>
                </div>
              </form>

            </div>
          </div>
        </div>
        
        <!-- Modal Editar -->
        <div class="modal fade" id="staticBackdrop-editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="edita-adm.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" id="idAdm" style = "display:none">
                    <label for="inputAddress">Nome</label>
                    <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="form-row">
                    <div class="email form-group col-md-6">
                      <label for="inputEmail4">Email</label>
                      <input name="email" type="email" class="form-control inputEmail" id="inputEmail4" placeholder="Email" required>
                    </div>          
                    <div class="senha form-group col-md-6">
                      <label for="inputPassword4">Senha</label>
                      <input name="senha" type="password" class="form-control inputSenha" id="inputPassword4" placeholder="Senha" required>
                    </div>                 
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input inputAtivo" type="checkbox" id="gridCheck" name = 'ativo' value = "1">
                      <label class="form-check-label" for="gridCheck">
                        Administrador ativo
                      </label>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-adicionar">Editar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>     
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="single-pag.js"></script>
<script src = "editar.js"></script>
</html>