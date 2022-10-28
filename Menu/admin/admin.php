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
                <a class="filtro" href= "admin.php">Configuração</a>
                <a class="filtro" href= "../categoria/categoria.php">Categorias</a>
                <a class="filtro" href= "../produto/produto.php">Produtos</a>
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
              <a class="nav-link" href= "admin.php" style="color: white; font-size: 22px;">Administração</a>
              <a class="nav-link" href= "../categoria/categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "../produto/produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>

      <!-- Configuração -->

      <section class= "secao-principal configuracao">
        <h1>Configuração</h1>
        <h3>Crie, exclua ou atualize dados de outros administradores</h3>
        <button type="button" class="btn btn-primary btn-cadastro" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-plus"></i>Adicionar administrador</button>
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

              <form class="form-adm" Action="edita-adm.php" method="POST">
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
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src= "../JavaScript/filtro.js"></script>
<script src= "../JavaScript/load.js"></script>
<script src= "../JavaScript/editar.js"></script>
</html>