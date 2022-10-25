<?php

include 'start-mysql.php';

//Checa se o login do usuário foi feito com sucesso
if(!$_COOKIE['nome']){
    header('Location:login-adm-erro.html');
}

//Query SQL para buscar administradores com @charlie
$cmd = $pdo->query("SELECT ADM_EMAIL, ADM_SENHA, ADM_ATIVO, ADM_NOME, ADM_ID 
FROM ADMINISTRADOR 
WHERE ADM_EMAIL LIKE '%@charlie%'");

$admins = [];

//Guardando as informações recebidas
while($linha = $cmd->fetch(PDO::FETCH_ASSOC))
{
    $admins[] = $linha;
}

//Categoria
$cmdCategoria = $pdo->query("SELECT CATEGORIA_ID, CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO 
FROM CATEGORIA 
WHERE CATEGORIA_DESC LIKE 'Livros%' OR CATEGORIA_DESC LIKE 'Histórias%'");

$categorias = [];

//Guardando as informações recebidas
while($linha = $cmdCategoria->fetch())
{ 
    $categorias[] = $linha;
}


//Produto, Produto_imagem e Produto_estoque
$cmdProduto = $pdo->query("SELECT P.PRODUTO_ID, P.PRODUTO_NOME, P.PRODUTO_DESC, P.PRODUTO_ATIVO, P.PRODUTO_DESCONTO, P.PRODUTO_PRECO, P.CATEGORIA_ID, PE.PRODUTO_QTD
FROM PRODUTO AS P INNER JOIN PRODUTO_ESTOQUE AS PE
ON P.PRODUTO_ID = PE.PRODUTO_ID");

$produtos = [];

//Guardando as informações recebidas
while($linha = $cmdProduto->fetch())
{ 
    $produtos[] = $linha;
}


