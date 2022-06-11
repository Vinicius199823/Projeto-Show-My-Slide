<?php

    $hostname = "localhost";
    $db = "bancosms";
    $username = "root";
    $password = "";

    try{  
        $conn = new PDO("mysql:host=$hostname;bancosms=php_crud", $username, $password);
        //echo $conn;
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
     catch(PDOException $e) { 
        echo "Database connection failed: " . $e->getMessage();
     }

?>