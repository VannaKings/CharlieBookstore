<?php
    include 'start-mysql.php';


    $id = $_POST['id'];
    $ativo = $_POST['ativo'];
    $cmd = $pdo->prepare("UPDATE ADMINISTRADOR SET ADM_ATIVO = :ativo WHERE ADM_ID = :id");
    if($ativo == 1){
        $cmd->bindValue(":ativo", 0);
    }
    else{
        $cmd->bindValue(":ativo", 1);
    }
    
    $cmd->bindValue(":id",$id);
    
    $cmd->execute();
    header('Location: menu-adm.php');
?>;
<!-- <form action="menu-adm.php" method="post">
    <?php
        $email = $_COOKIE['email'];
        $senha = $_COOKIE['senha'];
        echo "<input type = 'text' value ='$email'  name = 'email' style = 'display:none;'><input type = 'text' value ='$senha' name='senha' style = 'display:none;'>";
    ?>
    
    <input type="submit" value="VOLTAR">
</form> -->