<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    include 'start-mysql.php';
    $cmd = $pdo->query("SELECT * FROM CATEGORIA");
    ?>

     <table border = '1'>
        <tr>
            <th>
                Nome
            </th>
            <th>
                Descrição
            </th>    
        </tr>
    <?php 
    while($linha = $cmd->fetch())
    {
    ?>
        <tr>
            <td><?php echo $linha["CATEGORIA_NOME"];?></td>
            <td><?php echo $linha["CATEGORIA_DESC"]; ?></td>
            <td><?php echo $linha["CATEGORIA_ATIVO"];?></td>
        </tr>
    <?php
    }
    ?>
     </table>
   
   
    <form action="categoria.php" method="post">
        <input type="text" name="nome">
        <br>
        <input type="text" name="desc">
        <br>
        <input type="checkbox" name="ativo">
        <br>
        <input type="submit" value="Enviar">    
        <br>
        
    </form>
</body>
</html>

