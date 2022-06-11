<?php
        include('conexao.php');
    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id'])){
        die("Você não tem acesso! <p><a href=\"login.php\">entrar</a></p>");
    }
?>