<?php
    session_start();

    // Se existir a marcacao de estar logado
    if(isset($_SESSION["logado"]) == false) {
        header("Location: ../../Login/login-adm.php");
    }