<?php
    $usuario = 'root';
    $senha = '';
    $database = 'bancosms';
    $host = 'localhost';

    $mysqli = new mysqli($host , $usuario, $senha, $database);

    if($mysqli->error){
        die("Falha na conexão com o Banco de dados: " . $mysqli->error);
    }
?>