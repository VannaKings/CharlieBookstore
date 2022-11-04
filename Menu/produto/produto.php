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
        <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop-adicionar-produto"><i class="fa-solid fa-book"></i>Adicionar produto</button>
        <?php
          //Alerta sobre situação do cadastrar
          if(isset($cadastrado))
          {
            if(!$cadastrado){
              echo '<div class="alert alert-danger" role="alert" style="margin-left:20px; max-width: 1000px">
                    Erro ao cadastrar, por favor tente novamente
                  </div>';
            }
            else
            {
              echo '<div class="alert alert-success" role="alert" style="margin-left:20px; max-width: 1000px">
                    Cadastro realizado com sucesso!
                  </div>';
            }
          }

          //Alerta sobre situação do editar
          if(isset($editado))
          {
            if(!$editado){
              echo '<div class="alert alert-danger" role="alert" style="margin-left:20px; max-width: 1000px">
                    Erro ao editar, por favor tente novamente
                  </div>';
            }
            else
            {
              echo '<div class="alert alert-success" role="alert" style="margin-left:20px; max-width: 1000px">
                    Alteração realizada com sucesso!
                  </div>';
            }
          }
        ?>
        <div class="container">
          <div class="container-filtro">
              <div class="titulo_filtro">
                  <i class="fa-solid fa-bookmark"></i>
                  <strong>FILTRO</strong>
              </div>
              <p>Categorias</p>              
              <div class="filter-box filter-categoria">
                <a href="#" data-filter="todos">Todos</a>
                <?php
                  foreach($categorias as $categoria)
                  {
                    echo "<a data-filter={$categoria["CATEGORIA_ID"]}>{$categoria["CATEGORIA_NOME"]}</a>";            
                  }
                ?>
              </div>
          </div>
          <div class="container-nav-produtos">
            <div class="container-produtos">              
            <?php
              foreach($produtos as $produto)
              {
                echo "
                <div class='card-produto card {$produto["CATEGORIA_ID"]}' style='max-width: 18rem; display:'flex'; >
                  <img src='#' alt='' class='card-img-top'>
                  <div class='card-body'>
                    <h5 class='titulo' style='height:48px'>{$produto["PRODUTO_NOME"]}</h5>

                    <p class='preco' style='font-size: 20px;'>{$produto["PRODUTO_PRECO"]}</p>

                    <p><strong class='estoque'>{$produto["PRODUTO_QTD"]}</strong> em estoque</p>

                    <div class='botoes-produto'>
                      <button type='button' class='btn btn-primary btn-editar-produto' data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar-produto'>
                        <i class='fa-solid fa-pen-to-square'></i>Editar
                      </button>
                      <button type='button' class='btn btn-secondary btn-visualizar-produto' data-bs-toggle='modal' data-bs-target='#staticBackdrop-visualizar-produto'>
                        <a href='detalhes.php' value={$produto["PRODUTO_ID"]} style='color: white; text-decoration: none;'><i class='fa-solid fa-magnifying-glass'></i>Detalhes</a>
                      </button>
                    </div>
                    
                    <div class='detalhes-container' style='display:none'>
                      <p class='idProduto'>{$produto["PRODUTO_ID"]}</p>
                      <p class='desc'>{$produto["PRODUTO_DESC"]}</p>
                      <p class='idCategoria'>{$produto["CATEGORIA_ID"]}</p>
                      <p class='desconto'>{$produto["PRODUTO_DESCONTO"]}</p>
                      <p class='ativo'>{$produto["PRODUTO_ATIVO"]}</p>                      
                    </div>
                  </div>
                </div>";
              }
            ?>                            
            </div>
          </div>          
        </div>
        
        <!-- Modal Detalhes -->
        <!-- <div class="modal fade modal-produto" id="staticBackdrop-visualizar-produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detalhes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
              
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary btn-adicionar">Editar</button>
              </div>

            </div>
          </div>
        </div> -->


        <!-- Modal Adicionar -->

        <div class="modal fade modal-produto" id="staticBackdrop-adicionar-produto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adicionar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="criar-produto.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" style = "display:none">
                    <label for="inputAddress">Título:</label>
                    <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="inputAddress">Preço:</label>
                      <input name="preco" type="text" class="form-control">
                    </div>
                    <div class="col">
                      <label for="inputAddress">Desconto:</label>
                      <input name="desconto" type="text" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="inputPassword4">Categoria:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
                        <select name="categoria" class="form-select" id="inputGroupSelect01">
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
                        <input name="estoque" type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '0' step = '1'>
                      </div>                 
                    </div>
                  </div>
                  <div class="col" style="margin-top:10px">
                    <label for="formFile" class="form-label">Insira as imagens:</label>
                    <div class="input-group flex-nowrap">
                      <span class="input-group-text"><i class="fa-solid fa-camera"></i></span>
                      <input class="form-control" type="file" name="imagem[]" multiple="multiple">
                    </div>                    
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea name="desc" class="form-control"></textarea>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input inputAtivo" type="checkbox" name= 'ativo'>
                    <label class="form-check-label" for="gridCheck">
                      Produto ativo
                    </label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-adicionar">Adicionar</button>
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

              <form class="form-adm" Action="edita-produto.php" method="POST">
                <div class="modal-body">
                  <div class="form-group">
                    <input type="text" name="id" id="idProduto" style = "display:none">
                    <label for="inputAddress">Título:</label>
                    <input name="nome" type="text" class="form-control nome inputTitulo" id="inputName" placeholder="Nome" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="inputAddress">Preço:</label>
                      <input name="preco" type="text" class="form-control inputPreco" aria-label="First name">
                    </div>
                    <div class="col">
                      <label for="inputAddress">Desconto:</label>
                      <input name="desconto" type="text" class="form-control inputDesconto" aria-label="Last name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col">
                      <label for="inputPassword4">Categoria:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
                        <select name="categoria" class="form-select" id="inputGroupSelect01">
                          <option></option>
                          <?php
                            //Percorre o nome das categoria e cria uma option para cada uma
                            foreach($categorias as $categoria)
                            {                          
                              echo "<option value={$categoria["CATEGORIA_ID"]} class = 'inputCategoria'>{$categoria["CATEGORIA_NOME"]}</option>";
                            }
                          ?>
                        </select>
                      </div>                 
                    </div>
                    <div class="col">
                      <label for="inputPassword4">Estoque:</label> 
                      <div class="input-group flex-nowrap">                      
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-archive"></i></span>
                        <input name="estoque" type="number" class="form-control inputEstoque" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '0' step = '1'>
                      </div>                 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Descrição:</label>
                    <textarea name="desc" class="form-control inputDesc" id="message-text"></textarea>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input inputAtivo" type="checkbox" id="gridCheck" name= 'ativo'>
                    <label class="form-check-label" for="gridCheck">
                      Produto ativo
                    </label>
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
<script src= "../../JavaScript/filtro.js"></script>
<script src= "../../JavaScript/editar-produto.js"></script>
</html>