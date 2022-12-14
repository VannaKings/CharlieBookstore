<?php

include 'start-mysql.php';

//Checa se o login do usuário foi feito com sucesso
// if(!$_COOKIE['nome']){
//     header('Location:login-adm-erro.html');
// }

//Query SQL para buscar administradores com @charlie
$cmd = $pdo->query("SELECT ADM_EMAIL, ADM_SENHA, ADM_ATIVO, ADM_NOME, ADM_ID 
FROM ADMINISTRADOR
WHERE ADM_EMAIL NOT LIKE ''
ORDER BY ADM_NOME");

$admins = [];

//Guardando as informações recebidas
while($linha = $cmd->fetch(PDO::FETCH_ASSOC))
{
    $admins[] = $linha;
}

//Categoria
$cmdCategoria = $pdo->query("SELECT CATEGORIA_ID, CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO 
FROM CATEGORIA
ORDER BY CATEGORIA_NOME");

$cmdCategoriaAtiva = $pdo->query("SELECT CATEGORIA_ID, CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO 
FROM CATEGORIA 
WHERE CATEGORIA_ATIVO = 1
ORDER BY CATEGORIA_NOME");

$categorias = [];
$categoriasAtivas = [];

//Guardando as informações recebidas
while($linha = $cmdCategoria->fetch())
{ 
    $categorias[] = $linha;
}

//Guardando as informações recebidas
while($linha = $cmdCategoriaAtiva->fetch())
{ 
    $categoriasAtivas[] = $linha;
}



//Produto, Produto_imagem e Produto_estoque
$cmdProduto = $pdo->query("SELECT P.PRODUTO_ID, P.PRODUTO_NOME, P.PRODUTO_DESC, P.PRODUTO_ATIVO, P.PRODUTO_DESCONTO, P.PRODUTO_PRECO, (P.PRODUTO_PRECO - P.PRODUTO_DESCONTO) AS 'DESCONTO', P.CATEGORIA_ID, PE.PRODUTO_QTD, PI.IMAGEM_ORDEM, PI.IMAGEM_URL
FROM PRODUTO AS P LEFT OUTER JOIN PRODUTO_ESTOQUE AS PE
ON P.PRODUTO_ID = PE.PRODUTO_ID
INNER JOIN PRODUTO_IMAGEM AS PI
ON P.PRODUTO_ID = PI.PRODUTO_ID
WHERE PI.IMAGEM_ORDEM = 1
ORDER BY P.PRODUTO_NOME");

$produtos = [];

//Guardando as informações recebidas
while($linha = $cmdProduto->fetch())
{ 
    $produtos[] = $linha;
}


// $cmdFiltro = $pdo->query("SELECT C.CATEGORIA_ID, C.CATEGORIA_NOME, C.CATEGORIA_DESC, COUNT(P.PRODUTO_NOME)
// FROM CATEGORIA AS C INNER JOIN PRODUTO AS P
// ON C.CATEGORIA_ID = P.CATEGORIA_ID
// GROUP BY C.CATEGORIA_ID
// WHERE CATEGORIA_DESC LIKE 'Livros%' OR CATEGORIA_DESC LIKE 'Histórias%'");

// $filtro = [];

// while($linha = $cmdFiltro->fetch())
// { 
//     $filtro[] = $linha;
// }