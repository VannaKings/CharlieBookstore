<?php

include "../../start-mysql.php";

//Pegando o Input do usuário

$ordem = $_POST['ordem'];
$produto = $_POST['produto'];
$id = $_POST['produto'];

$IMGUR_CLIENT_ID = "046874d6e062fb8";

    
//
// Se nao nenhum arquivo for selecionado, entao informa que precisa selecionar um 
//
if(empty($_FILES["imagem"]["name"])){ 
    die('Selecione um arquivo para fazer o upload');
} 

$arquivo = $_FILES["imagem"];

//
// captura O nome e a extensao do arquivo
//
$fileName = basename($_FILES["imagem"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

//
// Verifica os tipo de arquivo (extensao) são os mais adequados
//
$allowTypes = array('jpg','png','jpeg','gif'); 
if(in_array($fileType, $allowTypes)){ 

    //
    // Abre o arquivo 
    //
    $handle = fopen($_FILES['imagem']['tmp_name'], "rb");
    $image_source = stream_get_contents($handle, filesize($_FILES['imagem']['tmp_name']));
    
    
    //
    // Post image to Imgur via Web Service API 
    //


    // Inicia o metodo para upload via POST do HTTP
    $ch = curl_init(); 
    //Configura a url de destino
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
    //Estabelece que sera via POST
    curl_setopt($ch, CURLOPT_POST, TRUE); 
    //Adiciona a Chave do servico ao cabecalho da requisicao
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
    //Adiciona os campos 
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_source)); 
    //Estabelece detalhes do processo
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    //Informa que aguardara o retorno
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

    //
    // Inicia o upload
    //
    $response = curl_exec($ch); 

    //
    // Se ocorreu algum erro no processo de upload para o Servico IMGUR
    //
    if(curl_errno($ch)) {
        echo 'Curl erro: '.curl_error($ch);
        die();
    }
    

    //
    // Captura a resposta do upload
    //
    curl_close($ch); 
    $responseArr = json_decode($response); 
    
    //
    // Se o conteudo enviado nao for vazio, ou seja, tem um Link para a imagem, a exibe
    //
    if(!empty($responseArr->data->link)){ 
        //AQUI VOCE VAI INSERRIR NO BANCO O LINK ABAIXO
        $urlIMG = $responseArr->data->link; //retorna o Link da imagem
        
    }else{ 
        // Caso tenha algum erro         
        echo 'ERRO: Imagem não foi inserida'; 
    } 
}else{ 
    // Formato de imagem nao permitido
    echo 'Não é permitido esse formato de imagem'; 
}

//Inserindo a imagem no banco
$cmd = $pdo->prepare("INSERT INTO PRODUTO_IMAGEM(PRODUTO_ID, IMAGEM_URL, IMAGEM_ORDEM) 
        VALUES('" . $id . "', '" . $urlIMG . "', '" . $ordem . "')");


//Checa se o nome tiver algo e executa 
try {
    $cmd->execute();
    $cadastrado = true;
} catch (Exception $e) {
    $cadastrado = false;
    
}
header("Location: /CharlieBookstore/Menu/produto/update-form.php?id=$produto&cadastrado=$cadastrado");
    
    
