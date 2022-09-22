<?php
if($_COOKIE['nome']){
    echo $_COOKIE['nome'];
  }  
  else{
    header('Location:login-adm-erro.html');
  }
?>