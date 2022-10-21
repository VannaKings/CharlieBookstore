<?php

include 'start-mysql.php';

//Checa se o login do usuário foi feito com sucesso
if(!$_COOKIE['nome']){
    header('Location:login-adm-erro.html');
}

//Query SQL para buscar administradores com @charlie
$cmd = $pdo->query("SELECT ADM_EMAIL, ADM_SENHA, ADM_ATIVO, ADM_NOME, ADM_ID FROM ADMINISTRADOR WHERE ADM_EMAIL LIKE '%@charlie%'");

$admins = [];

//Guardando as informações recebidas
while($linha = $cmd->fetch(PDO::FETCH_ASSOC))
{
    $admins[] = $linha;
}

//Categoria
$cmdCategoria = $pdo->query("SELECT CATEGORIA_ID, CATEGORIA_NOME, CATEGORIA_DESC, CATEGORIA_ATIVO FROM CATEGORIA WHERE CATEGORIA_DESC LIKE 'Livros%' OR 'Histórias%'");

$categorias = [];

//Guardando as informações recebidas
while($linha = $cmdCategoria->fetch())
{ 
    $categorias[] = $linha;
}


//Produto
$cmdProduto = $pdo->query("SELECT PRODUTO_ID, PRODUTO_NOME, PRODUTO_DESC, PRODUTO_ATIVO, PRODUTO_DESCONTO, PRODUTO_PRECO, CATEGORIA_ID FROM PRODUTO");

$produtos = [];

//Guardando as informações recebidas
while($linha = $cmdProduto->fetch())
{ 
    $produtos[] = $linha;
}


