<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/detalhes-produto.css">
    
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

      $id = $_GET['id'];

      //Pegando os detalhes que ficarão em destaque
      $detalhe = $pdo->query("SELECT P.PRODUTO_ID, P.PRODUTO_NOME, P.PRODUTO_PRECO, (P.PRODUTO_PRECO-P.PRODUTO_DESCONTO) AS DESCONTO, PI.IMAGEM_URL, P.PRODUTO_DESC, P.PRODUTO_ATIVO, PE.PRODUTO_QTD
      FROM PRODUTO AS P LEFT OUTER JOIN PRODUTO_ESTOQUE AS PE
      ON P.PRODUTO_ID = PE.PRODUTO_ID
      INNER JOIN PRODUTO_IMAGEM AS PI
      ON P.PRODUTO_ID = PI.PRODUTO_ID
      WHERE P.PRODUTO_ID = " . $id . " AND PI.IMAGEM_ORDEM = 1")->fetch();

      //Pegando todas as imagens exceto a de capa
      $cmdImagem = $pdo->query("SELECT P.PRODUTO_ID, PI.IMAGEM_ORDEM, PI.IMAGEM_URL
      FROM PRODUTO AS P INNER JOIN PRODUTO_IMAGEM AS PI
      ON P.PRODUTO_ID = PI.PRODUTO_ID
      WHERE P.PRODUTO_ID = " . $id . " AND PI.IMAGEM_ORDEM <> 1");

      $imagens = [];
      
      while($linha = $cmdImagem->fetch()){
        $imagens[] = $linha;
      }

      $categoria= $pdo->query("SELECT C.CATEGORIA_NOME
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
              <a class="nav-link " href= "../home.php" style="color: white; font-size: 22px;">Home</a>
              <a class="nav-link" href= "../admin/admin.php" style="color: white; font-size: 22px;">Administração</a>
              <a class="nav-link" href= "../categoria/categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>
      
      <!-- Seção Detalhes -->

      <section class= "secao-principal produtos secao-produtos" style="display:flex; flex-direction:column; ">
            
          <h1 style="max-width:100%; margin-left:20px; background-color:white">Em manutenção, por favor volte mais tarde!</h1>
          <img style="max-height:700px;" src="../../imgs/manutencao.jpeg" alt="">      
       
      </section>
    </main>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src= "../../JavaScript/filtro.js"></script>
<script src= "../../JavaScript/editar-produto.js"></script>
</html>