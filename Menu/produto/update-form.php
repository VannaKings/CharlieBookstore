<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../CSS/detalhes.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/menu.css">    
    <link rel="stylesheet" type="text/css" href="../../CSS/editar-produto.css">

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

      //Pegando o id do produto
      $id = $_GET['id'];

      //Checando se foi realizado alguma tentativa de edição
      if(isset($_GET['editado']))
      {
        $editado = $_GET['editado'];
      }

      if(isset($_GET['cadastrado']))
      {
        $cadastrado = $_GET['cadastrado'];
      }

      //Pegando os detalhes que ficarão em destaque
      $detalhe = $pdo->query("SELECT P.PRODUTO_ID, P.PRODUTO_NOME, P.PRODUTO_PRECO, P.PRODUTO_DESCONTO, (P.PRODUTO_PRECO-P.PRODUTO_DESCONTO) AS DESCONTO, PI.IMAGEM_URL, P.PRODUTO_DESC, P.PRODUTO_ATIVO, PE.PRODUTO_QTD 
      FROM PRODUTO AS P LEFT OUTER JOIN PRODUTO_ESTOQUE AS PE
      ON P.PRODUTO_ID = PE.PRODUTO_ID
      INNER JOIN PRODUTO_IMAGEM AS PI
      ON P.PRODUTO_ID = PI.PRODUTO_ID
      WHERE P.PRODUTO_ID = " . $id . " AND PI.IMAGEM_ORDEM = 1")->fetch();

      //Pegando todas as imagens
      $cmdImagem = $pdo->query("SELECT PRODUTO_ID, IMAGEM_ORDEM, IMAGEM_URL, IMAGEM_ID
      FROM PRODUTO_IMAGEM    
      WHERE PRODUTO_ID = " . $id . "");

      $imagens = [];
      
      while($linha = $cmdImagem->fetch()){
        $imagens[] = $linha;
      }

      //Pegando nome e id de categoria do produto
      $categoria= $pdo->query("SELECT C.CATEGORIA_NOME, P.CATEGORIA_ID
      FROM PRODUTO AS P INNER JOIN CATEGORIA AS C
      ON P.CATEGORIA_ID = C.CATEGORIA_ID
      WHERE P.PRODUTO_ID = " . $id . "")->fetch();

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
        <!-- Navegador Perfil -->   
        <ul class="nav-vertical">  
            <li><i class="fa-solid fa-house" style="color:#ed8863;"></i><a class="filtro" href="../home.php">Home</a></li>          
            <li><i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i><a href="../../logout-adm.php">Sair</a></li>
        </ul>    
        <h1>Navegador</h1>        
        <!-- Nav seções -->
        <ul class="nav-vertical">
            <li><i class="fa-solid fa-gear" style="color:#1195d3;"></i><a class="filtro" href= "../admin/admin.php">Configuração</a></li>
            <li><i class="fa-solid fa-list" style="color:#4ed5a3;"></i><a class="filtro" href= "../categoria/categoria.php">Categorias</a></li>
            <li style="background-color:#ed8863"><i class="fa-solid fa-book" style="color:white;"></i><a class="filtro" style="color:white;"href= "produto.php">Produtos</a><li>
        </ul>
    </section>
    
    <!-- Bootstrap (com style dentro em algumas tags) -->
    <main class="conteudo">
      <div class="conteudo">
        <nav class="navegador navbar navbar-expand-lg" style="background-color: #61cdff;">
          <!-- Nav com data-filter -->
          <div class="nav  navbar navbar-expand-lg ">
              <a class="nav-link nav1" href= "../home.php" style="color: white; font-size: 22px;">Home</a>
              <a class="nav-link" href= "../admin/admin.php" style="color: white; font-size: 22px;">Administração</a>
              <a class="nav-link" href= "categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "../produto/produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>

      <!-- Seção Editar Produto  -->
      <section class="secao-principal categorias">
        <div class="container-alinhamento" style= "margin-left:70px">
          <h1 style= "margin-left:0">Editar</h1>

          <?php
              //Alerta sobre situação do cadastrar
              if(isset($cadastrado))
              {
                if(!$cadastrado){
                  echo '<div class="alert alert-danger" role="alert" style="margin:10px 0 0 20px; max-width: 950px">
                        Erro ao cadastrar imagem, por favor tente novamente
                      </div>';
                }
                else
                {
                  echo '<div class="alert alert-success" role="alert" style="margin:10px 0 0 20px; max-width: 950px">
                        Cadastro realizado com sucesso!
                      </div>';
                }
              }

              //Alerta sobre situação do editar
              if(isset($editado))
              {
                if(!$editado){
                  echo '<div class="alert alert-danger" role="alert" style="margin:10px 0 0 20px; max-width: 950px">
                        Erro ao editar, por favor tente novamente
                      </div>';
                }
                else
                {
                  echo '<div class="alert alert-success" role="alert" style="margin:10px 0 0 20px; max-width: 950px">
                        Alteração de imagem realizada com sucesso!
                      </div>';
                }
              }
            ?>
          
          <div class="container-teste">

            <form class="form-adm form-produto-editar" Action="edita-produto.php" method="POST" >
              
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" name="id" id="idProduto" style = "display:none">
                  <label for="inputAddress">Título:</label>
                  <input name="nome" type="text" class="form-control nome inputTitulo" id="inputName" placeholder="Nome" 
                  value="<?php echo $detalhe["PRODUTO_NOME"]?>" required>
                </div>
                <div class="row">
                  <div class="col">
                    <label for="inputAddress">Preço:</label>
                    <input name="preco" type="text" class="form-control inputPreco" aria-label="First name"
                    value="<?php echo $detalhe["PRODUTO_PRECO"]?>">
                  </div>
                  <div class="col">
                    <label for="inputAddress">Desconto:</label>
                    <input name="desconto" type="text" class="form-control inputDesconto" aria-label="Last name"
                    value="<?php echo $detalhe["PRODUTO_DESCONTO"]?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col">
                    <label for="inputPassword4">Categoria:</label> 
                    <div class="input-group flex-nowrap">                      
                      <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-list"></i></span>
                      <select name="categoria" class="form-select" id="inputGroupSelect01">
                        <option value="<?php $categoria["CATEGORIA_ID"]?>" selected><?php echo $categoria["CATEGORIA_NOME"]?></option>
                        <?php
                          //Percorre o nome das categoria e cria uma option para cada uma
                          foreach($categoriasAtivas as $categoria)
                          {                          
                            echo "<option value={$categoria["CATEGORIA_ID"]} class='inputCategoria'>{$categoria["CATEGORIA_NOME"]}</option>";
                          }
                        ?>
                      </select>
                    </div>                 
                  </div>
                  <div class="col">
                    <label for="inputPassword4">Estoque:</label> 
                    <div class="input-group flex-nowrap">                      
                      <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-box-archive"></i></span>
                      <input name="estoque" type="number" class="form-control inputEstoque" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '0' step = '1'
                      value="<?php echo $detalhe["PRODUTO_QTD"]?>">
                    </div>                 
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Descrição:</label>
                  <textarea name="desc" class="form-control inputDesc" id="message-text" rows='7'>
                  <?php
                    echo $detalhe["PRODUTO_DESC"];
                  ?>
                  </textarea>
                </div>
                <div class="form-check">
                  <input class="form-check-input inputAtivo" type="checkbox" id="gridCheck" name= 'ativo' <?php echo $detalhe["PRODUTO_ATIVO"] ? "checked" : ""; ?>>
                  <label class="form-check-label" for="gridCheck">
                    Produto ativo
                  </label>
                </div>
                <div class='container-btn-update'>
                  <button type='submit' class='btn btn-success'><i class="fa-regular fa-floppy-disk"></i>Salvar</button>
                  <button type='button' class='btn btn-secondary'>
                    <a href="<?php echo "detalhes.php?id=$id";?>"><i class="fa-solid fa-magnifying-glass"></i>Detalhes</a>
                  </button>
                </div>
              </div>

              <div class="col">
                  <label for="formFile" class="form-label">Imagens:</label>
                  <div class="img-list-editar" >
                    <?php 
                      foreach ($imagens as $imagem)
                      {
                          echo "<div style='margin-right:10px' class='container-img'>
                                  <div class='imgs' style='margin-left:0;'>
                                    <img src={$imagem["IMAGEM_URL"]} >
                                  </div>

                                  <p class='ordem' style='display:none'>{$imagem["IMAGEM_ORDEM"]}</p>
                                  <p class='id' style='display:none'>{$imagem["IMAGEM_ID"]}</p>
                                  
                                  <div class = 'container-button'>
                                    <button type='button' class='btn btn-primary btn-editar-imagem' data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar-imagem'><i class='fa-solid fa-pen-to-square'></i> Editar</button>
                                  </div>
                                </div>";                          
                      }
                    ?>
                    <div class='container-adicionar'>
                      <button type='button' class='btn btn-link' data-bs-toggle='modal' data-bs-target='#staticBackdrop-adicionar-imagem'><i class="fa-solid fa-plus"></i></button>
                    </div>
                  </div>                                
              </div>
            </form>
          </div>
        </div>

        <!-- Editar Imagem -->              

        <div class="modal fade" id="staticBackdrop-editar-imagem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="edita-imagem.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  
                  <!-- id do produto -->
                  <input type="hidden" name="produto" value='<?php echo $id?>'>
                  <!-- id da imagem -->
                  <input type="hidden" name="id" id="inputId" value=''>                      

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Ordem:</label>
                  </div>

                  <div class='input-group flex-nowrap'>
                    
                    <input name="ordem" type="number" class="form-control inputOrdem" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '1' step = '1'  value='' style="max-width:70px"required>
                    <input class='form-control' type='file' name='imagem' required>
                  </div>
                  

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-adicionar">Salvar</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <!-- Adicionar Imagem -->

        <div class="modal fade" id="staticBackdrop-adicionar-imagem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Adicionar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form class="form-adm" Action="criar-imgs.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  
                  <!-- id do produto -->
                  <input type="hidden" name="produto" value='<?php echo $id?>'>                   

                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Ordem:</label>
                  </div>

                  <div class='input-group flex-nowrap'>                        
                    <input name="ordem" type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="addon-wrapping" min = '1' step = '1'  value='' style="max-width:70px"required>
                    <input class='form-control' type='file' name='imagem' required>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary btn-adicionar">Salvar</button>
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
<script src= "../../JavaScript/editar-imagem.js"></script>
</html>