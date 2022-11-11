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
        <!-- Navegador Perfil -->   
        <ul class="nav-vertical">  
            <li><i class="fa-solid fa-house" style="color:#ed8863;"></i><a class="filtro" href="../home.php">Home</a></li>          
            <li><i class="fa-solid fa-unlock" style="color: rgb(251, 101, 101);"></i><a href="../../logout-adm.php">Sair</a></li>
        </ul>    
        <h1>Navegador</h1>        
        <!-- Nav seções -->
        <ul class="nav-vertical">
            <li><i class="fa-solid fa-gear" style="color:#1195d3;"></i><a class="filtro" href= "../admin/admin.php">Configuração</a></li>
            <li style="background-color:#ed8863;"><i class="fa-solid fa-list" style="color:white;"></i><a style="color:white;" class="filtro" href= "categoria.php">Categorias</a></li>
            <li><i class="fa-solid fa-book" style="color:#4e4ed5;"></i><a class="filtro" href= "../produto/produto.php">Produtos</a><li>
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

      <!-- Seção Categoria -->
      <section class="secao-principal categorias">
        <div class="container-alinhamento">
          <h1>Categorias</h1>
          <h3>Personalize as categorias existentes no seu site</h3>
          <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop-categoria"><i class="fa-solid fa-plus"></i>Adicionar categoria</button>
          
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
          <div class="container-teste">
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
                    <td class = 'nome-tabela'>
                        {$categoria["CATEGORIA_NOME"]}         
                    </td>
                    <td class = 'desc-tabela'>
                        {$categoria["CATEGORIA_DESC"]}         
                    </td>";
                      
                    if($categoria["CATEGORIA_ATIVO"])
                    {
                      echo '<td class="ativo-tabela"><i class="fa-solid fa-circle-check"></i></td>';                  
                    }
                    else
                    {
                      echo '<td class="ativo-tabela"><i class="fa-solid fa-circle-exclamation"></i></td>';
                    }                                        
                    
                    echo "
                      <td class = 'id-tabela' style = 'display:none;'>                    
                        {$categoria["CATEGORIA_ID"]}
                      </td>  
                      <td>                                         
                        <button type='button' class='btn btn-primary btn-selecionar-editar' style='background: none; border: none; padding: 0;'data-bs-toggle='modal' data-bs-target='#staticBackdrop-editar-categoria'><i class='fa-solid fa-pen-to-square'></i></button>
                      </td>
                  </tr>";
                } 
              ?>
            </table>
            

            <!-- Adicionar Categoria -->
            <div class="modal fade" id="staticBackdrop-categoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Cadastrar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <form class="form-adm" Action="criar-categoria.php" method="POST">
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

                  <form class="form-adm" Action="edita-categoria.php" method="POST">
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" name="id" id="idCategoria" style = "display:none">
                        <label for="inputAddress">Nome</label>
                        <input name="nome" type="text" class="form-control nome inputNome" id="inputName" placeholder="Nome" required>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Descrição:</label>
                        <textarea class="form-control inputDesc" name="desc"></textarea>
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input inputAtivo" type="checkbox" id="gridCheck" name= 'ativo'>
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
          </div>
        </div>
      </section>
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src= "../../JavaScript/editar-categoria.js"></script>
</html>