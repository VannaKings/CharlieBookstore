<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Charlie Bookstore</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../../CSS/detalhes.css">
    
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

      //Pegando todas as imagens
      $cmdImagem = $pdo->query("SELECT P.PRODUTO_ID, PI.IMAGEM_ORDEM, PI.IMAGEM_URL
      FROM PRODUTO AS P INNER JOIN PRODUTO_IMAGEM AS PI
      ON P.PRODUTO_ID = PI.PRODUTO_ID
      WHERE P.PRODUTO_ID = " . $id . "");

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
              <a class="nav-link nav1" href= "../home.php" style="color: white; font-size: 22px;">Home</a>
              <a class="nav-link" href= "../admin/admin.php" style="color: white; font-size: 22px;">Administração</a>
              <a class="nav-link" href= "../categoria/categoria.php" style="color: white; font-size: 22px;">Categorias</a>            
              <a class="nav-link" href= "produto.php" style="color: white; font-size: 22px;">Produtos</a>              
          </div>
        </nav>
      <div>
      
      <!-- Seção Detalhes -->

      <section class= "secao-principal produtos secao-produtos">
        <div class="container-principal">
            <h1 style="margin-left:0; min-width:1200px;">Detalhes</h1>      
            <div class="detalhes-produto">
                <div class="container-detalhes">
                    <!-- Imagens -->
                    <?php
                        //Checando se existem mais imagens além da principal
                        if(count($imagens) > 1){
                            echo '<ul class="img-list">';
                            foreach($imagens as $imagem)  
                                echo "<li><img class='imgs' src={$imagem["IMAGEM_URL"]} alt='Imagem do produto'></li>";
                            echo '</ul>';
                        }
                        echo "<img class='img-principal' src={$detalhe["IMAGEM_URL"]} alt='Imagem principal'>";
                    ?>
                    <div class="informacoes">
                        <?php
                            echo "<h2>{$detalhe["PRODUTO_NOME"]}</h2>";
                            
                            //Checando se existe desconto
                            if($detalhe["PRODUTO_PRECO"] != $detalhe["DESCONTO"])
                            {
                                echo "<p class='preco-destaque'>R$ {$detalhe["DESCONTO"]}</p>
                                <p>De: <strong class='preco-antigo'>R$ {$detalhe["PRODUTO_PRECO"]}</strong></p>";
                            }
                            else
                            {
                                echo "<p class='preco-destaque'>R$ {$detalhe["PRODUTO_PRECO"]}</p>";
                            }

                            if($detalhe["PRODUTO_ATIVO"])
                            {
                                echo "<p class='informacoes-texto'><i class='fa-solid fa-circle-check'></i> Ativo </p>";
                                
                            }
                            else
                            {
                                echo "<p class='informacoes-texto'><i class='fa-solid fa-circle-exclamation'></i> Inativo </p>";
                            }

                            echo "<p class='informacoes-texto'><i class='fa-solid fa-book-open' style='color:purple; margin-right:6px;'></i>Gênero: {$categoria["CATEGORIA_NOME"]}</p>";
                            
                            //Checando se existe o número da qtd em estoque
                            if($detalhe["PRODUTO_QTD"])
                            {
                                //Verificando se a quantidade é maior que 0 para mudar a cor do icone
                                if($detalhe["PRODUTO_QTD"] > 0)
                                {
                                    echo "<p class='informacoes-texto'><i class='fa-solid fa-box' style='color:rgb(109, 210, 109); margin-right:10px;'></i>Estoque: {$detalhe["PRODUTO_QTD"]}</p>";
                                }
                                else {
                                    echo "<p class='informacoes-texto'><i class='fa-solid fa-box' style='color:red; margin-right:10px;'></i>Estoque: {$detalhe["PRODUTO_QTD"]}</p>";
                                }
                            }
                            else {
                                echo "<p class='informacoes-texto'><i class='fa-solid fa-box' style='color:red; margin-right:10px;'></i>Estoque: Sem informações</p>";
                            }

                            
                            
                            echo "<p class='informacoes-texto'><strong>Descrição: </strong>{$detalhe["PRODUTO_DESC"]} </p>"
                        ?>
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
<script src= "../../JavaScript/produto.js"></script>
</html>