
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
      //Inicia o banco de dados
      include "query-selector.php";
         

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
                echo $_COOKIE['nome'];
              ?>
            </p>
            <p class="cargo">Administrador</p>
        </div>
        <div class="navegador">
             <!-- Navegador Perfil -->
            <div class="icons">
                <i class="fa-solid fa-house" style="color:#ed8863;"></i>                
                <i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i>
            </div>
             <!-- Nav com data-filter -->     
            <ul class="nav-perfil nav">  
                <li class="filtro" data-filter="home">Home</li>          
                <li><a href="login-adm.php">Sair</a></li>
            </ul>            
        </div>
        <h1>Navegador</h1>
        <div class="navegador" id="navegador2">
            <!-- Navegador Funções -->
            <div class="icons">
                <i class="fa-solid fa-gear" style="color:#1195d3;"></i>
                <i class="fa-solid fa-list" style="color:#4ed5a3;"></i>
                <i class="fa-solid fa-book" style="color:#4e4ed5;"></i>
            </div>
             <!-- Nav com data-filter -->
            <ul class="nav-funcoes nav">
                <li class="filtro" data-filter="configuracao">Configuração</li>
                <li class="filtro" data-filter="categorias">Categorias</li>
                <li class="filtro" data-filter="produtos">Produtos</li>
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
              <a class="nav-link filtro" href="#" style="color: white;" data-filter="configuracao">Administração</a>
              <a class="nav-link filtro" href="#" style="color: white;" data-filter="categorias">Categorias</a>            
              <a class="nav-link filtro" href="#" style="color: white;" data-filter="produtos">Produtos</a>              
          </nav>
        </div>
      </nav>

      <!-- Home -->

      <section class="secao-principal home">
        <h1>Acesso Administrativo</h1>
        <h3>Veja quais são os principais acessos administrativos disponíveis para organizar seu site.</h3>
        <div class="funcoes">
          <div class="card navegador">
            <img src="imgs/categoria.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Organize suas categorias</h5>
              <p class="card-text">Adicione, edite ou exclua categorias existentes no seu site</p>
              <a href="#" class="btn btn-primary filtro" style="background-color: #ed8863; border-color: #ed8863; color: white;" data-filter="categorias">Organizar categorias</a>
            </div>
          </div>
          <div class="card navegador">
            <img src="imgs/livros.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Customize seus Produtos</h5>
              <p class="card-text">Personalize a visualização dos seus produtos ou adicione novos</p>
              <a href="#" class="btn btn-primary filtro" style="background-color: #ed8863; border-color: #ed8863; color: white;" data-filter="produtos">Editar produtos</a>
            </div>
          </div>
          <div class="card navegador">
            <img src="imgs/book-and-coffee.jpeg" class="card-img-top" alt="...">
            <div class="card-body nav">
              <h5 class="card-title">Edite os Administradores</h5>
              <p class="card-text">Adicione ou edite informações de outros administradores</p>
              <a href="#" class="btn btn-primary filtro" data-filter="configuracao" style="background-color: #ed8863; border-color: #ed8863; color: white">Configurar admins</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Configuração -->

      <section class= "secao-principal configuracao">
        <h1>Configuração</h1>
        <h3>Crie, exclua ou atualize dados de outros administradores</h3>
        <table class="table table-striped table-hover tabela">
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Ativo</th>
              <th>Editar</th>
            </tr>
            <?php
              //Cria tabela dos Admins
              foreach($admins as $admin)
              { 
                echo "  
                  <tr>
                    <td class = 'nome-adm-tabela'>
                    
                        {$admin["ADM_NOME"]}         
                    
                    </td>
                    <td class = 'email-adm-tabela'>
                      
                        {$admin["ADM_EMAIL"]}        
                      
                    </td>";
                 
                if($admin["ADM_ATIVO"])
                {
                  echo '<td class="ativo-adm-tabela"><i class="fa-solid fa-circle-check"></i></td>';                  
                }
                else
                {
                  echo '<td class="ativo-adm-tabela"><i class="fa-solid fa-circle-exclamation"></i></td>';
                }                                        
                  
                echo "
                    <td>                                        
                        <button type='button' class='btn btn-primary btn-selecionar-editar' style='background: none; border: none; padding: 0;'data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar'><i class='fa-solid fa-pen-to-square'></i></button>                    
                    </td>
                    <td class = 'senha-adm-tabela' style = 'display:none;'>                      
                        {$admin["ADM_SENHA"]}                      
                    </td>
                    <td class = 'id-adm-tabela' style = 'display:none;'>                    
                        {$admin["ADM_ID"]}                    
                    </td>                 
                  </tr>";        
              } 
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
              <form class="form-adm" Action="Criar/criar-adm.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputAddress">Nome:</label>
                    <input name="nome" type="text" class="form-control nome" id="inputName" placeholder="Nome" required>

                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="input-email">Email:</label>
                      <input name="email" type="email" class="form-control" placeholder="Email" required>
                    </div>          
                    <div class="col">
                      <label for="input-senha">Senha:</label>
                      <input name="senha" type="password" class="form-control"  placeholder="Senha" required>
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
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="Editar/edita-adm.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" id="idAdm" style = "display:none">
                    <label for="inputAddress">Nome</label>
                    <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="inputEmail4">Email</label>
                      <input name="email" type="email" class="form-control inputEmail" id="inputEmail4" placeholder="Email" required>
                    </div>          
                    <div class="col">
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

      <!-- Seção Categoria -->
      <section class="secao-principal categorias">
        <h1>Categorias</h1>
        <table class="table table-striped table-hover tabela" id="#">
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ativo</th>
            <th>Editar</th>
          </tr>
          <?php
            //Cria tabela de categoria
            foreach($categorias as $categoria)
            {
              echo "
              <tr>
                <td class = 'nome-categoria-tabela'>
                    {$categoria["CATEGORIA_NOME"]}         
                </td>
                <td class = 'desc-categoria-tabela'>
                     {$categoria["CATEGORIA_DESC"]}         
                </td>";
                  
                if($categoria["CATEGORIA_ATIVO"])
                {
                  echo '<td class="ativo-categoria-tabela"><i class="fa-solid fa-circle-check"></i></td>';                  
                }
                else
                {
                  echo '<td class="ativo-categoria-tabela"><i class="fa-solid fa-circle-exclamation"></i></td>';
                }                                        
                
                echo "
                  <td class = 'id-categoria-tabela' style = 'display:none;'>                    
                     {$categoria["CATEGORIA_ID"]}
                  </td>  
                  <td>                                         
                    <button type='button' class='btn btn-primary btn-selecionar-editar-categoria' style='background: none; border: none; padding: 0;'data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar-categoria'><i class='fa-solid fa-pen-to-square'></i></button>
                  </td>
              </tr>";
            } 
          ?>
        </table>
        <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop-categoria"><i class="fa-solid fa-plus"></i>Adicionar categoria</button>

        <!-- Adicionar Categoria -->
        <div class="modal fade" id="staticBackdrop-categoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Cadastrar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="form-adm" Action="Criar/criar-categoria.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="inputAddress">Nome:</label>
                    <input name="nome" type="text" class="form-control nome" id="inputName" placeholder="Nome" required>
                  </div>                  
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea name="desc" class="form-control"></textarea>
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

        <!-- Modal Editar Categoria -->

        <div class="modal fade" id="staticBackdrop-editar-categoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="Editar/edita-categoria.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="idCategoria" id="idCategoria" style = "display:none">
                    <label for="inputAddress">Nome</label>
                    <input name="nomeCategoria" type="text" class="form-control nome inputNomeCategoria" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea class="form-control InputDesc" name="desc"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input inputAtivo" type="checkbox" id="gridCheck" name= 'ativo-categoria'>
                      <label class="form-check-label" for="gridCheck">
                        Categoria ativa
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
      
      <!-- Seção Produtos -->

      <section class= "secao-principal produtos secao-produtos">
        <h1>Produtos</h1>
        <h3>Adicione ou edite produtos já existentes do seu site.</h3>
        <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop-adicionar-produto"><i class="fa-solid fa-book"></i>Adicionar produto</button>
        <div class="container">
          <div class="container-filtro">
              <div class="titulo_filtro">
                  <i class="fa-solid fa-bookmark"></i>
                  <strong>FILTRO</strong>
              </div>
              <p>Categorias</p>              
              <div class="filter-box">
                <a href="#" class="">Todos</a>
                <?php
                  foreach($categorias as $categoria)
                  {
                    echo "<a class={$categoria["CATEGORIA_ID"]}>{$categoria["CATEGORIA_NOME"]}</a>";            
                  }
                ?>
              </div>
          </div>
          <div class="container-nav-produtos">
            <div class="container-produtos">
              <div class="card-produto card" style="width: 18rem;">
                <img src="" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="nome">Nome do produto</h5>
                  <p class="preço">R$ 0,00 </p>
                  <p class="estoque">0 produtos em estoque</p>
                  <div class="botoes-produto">
                    <button type="button" class="btn btn-primary btn-editar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-editar-produto"><i class='fa-solid fa-pen-to-square'></i>Editar</button>
                    <button type="button" class="btn btn-secondary btn-visualizar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-visualizar-produto"><i class="fa-solid fa-magnifying-glass"></i>Detalhes</button>
                  </div>
                </div>
              </div>
              <div class="card-produto card" style="width: 18rem;">
                <img src="" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="nome">Nome do produto</h5>
                  <p class="preço">R$ 0,00 </p>
                  <p class="estoque">0 produtos em estoque</p>
                  <div class="botoes-produto">
                    <button type="button" class="btn btn-primary btn-editar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-editar-produto"><i class='fa-solid fa-pen-to-square'></i>Editar</button>
                    <button type="button" class="btn btn-secondary btn-visualizar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-visualizar-produto"><i class="fa-solid fa-magnifying-glass"></i>Detalhes</button>
                  </div>
                </div>
              </div>
              <div class="card-produto card" style="width: 18rem;">
                <img src="" alt="" class="card-img-top">
                <div class="card-body">
                  <h5 class="nome">Nome do produto</h5>
                  <p class="preço">R$ 0,00 </p>
                  <p class="estoque">0 produtos em estoque</p>
                  <div class="botoes-produto">
                    <button type="button" class="btn btn-primary btn-editar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-editar-produto"><i class='fa-solid fa-pen-to-square'></i>Editar</button>
                    <button type="button" class="btn btn-secondary btn-visualizar-produto" data-bs-toggle="modal" data-bs-target="#staticBackdrop-visualizar-produto"><i class="fa-solid fa-magnifying-glass"></i>Detalhes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>

        <!-- Modal Adicionar -->

        <div class="modal fade modal-produto" id="staticBackdrop-adicionar-produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adicionar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" id="idAdm" style = "display:none">
                    <label for="inputAddress">Título:</label>
                    <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="inputAddress">Preço:</label>
                      <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                      <label for="inputAddress">Desconto:</label>
                      <input type="text" class="form-control" aria-label="Last name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="inputPassword4">Categoria:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
                        <select class="form-select" id="inputGroupSelect01">
                          <option selected>Categoria</option>
                          <?php
                            //Percorre o nome das categoria e cria uma option para cada uma
                            foreach($categorias as $categoria)
                            {                          
                              echo "<option value={$categoria["CATEGORIA_ID"]}>{$categoria["CATEGORIA_NOME"]}</option>";
                            }
                          ?>
                        </select>
                      </div>                 
                    </div>
                    <div class="col">
                      <label for="inputPassword4">Estoque:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-archive"></i></span>
                        <input type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '0' step = '1'>
                      </div>                 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea class="form-control" id="message-text"></textarea>
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

        <!-- Modal Editar -->

        <div class="modal fade modal-produto" id="staticBackdrop-editar-produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" id="idAdm" style = "display:none">
                    <label for="inputAddress">Título:</label>
                    <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="inputAddress">Preço:</label>
                      <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                      <label for="inputAddress">Desconto:</label>
                      <input type="text" class="form-control" aria-label="Last name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="inputPassword4">Categoria:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
                        <select class="form-select" id="inputGroupSelect01">
                          <option selected>Categoria</option>
                          <?php
                            //Percorre o nome das categoria e cria uma option para cada uma
                            foreach($categorias as $categoria)
                            {                          
                              echo "<option value={$categoria["CATEGORIA_ID"]}>{$categoria["CATEGORIA_NOME"]}</option>";
                            }
                          ?>
                        </select>
                      </div>                 
                    </div>
                    <div class="col">
                      <label for="inputPassword4">Estoque:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-archive"></i></span>
                        <input type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '0' step = '1'>
                      </div>                 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea class="form-control" id="message-text"></textarea>
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
<script src= "JavaScript/single-pag.js"></script>
<script src= "JavaScript/editar.js"></script>
<script src= "JavaScript/editar-categoria.js"></script>
</html>