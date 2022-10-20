<?php
    //Inicia a sessao
    session_start();

    //Destroi todas as variaveis de sessao
    session_destroy();
    header("location:login-adm.php");
?>