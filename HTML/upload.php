<?php
    session_start();
    $utf8 = header ("Content-Type:text/html; charset=utf-8");
    $con = new mysqli('localhost', 'root', '','bancosms');
    $con -> set_charset("utf8");
    
    $arquivos_permitidos = ['jpg','jpeg','png'];

    $arquivos = isset($_FILES['arquivo']);

    $nomes = isset($arquivos['name']);

    for ($i=0; $i < 4; $i++){ 
        $extensao = explode('.', isset($nomes[$i]));
        $extensao = end($extensao);

        if(in_array($extensao,$arquivos_permitidos)){ 
            //$sql_code = "INSERT INTO arquivo (id, arquivo, data) VALUES (null, '$novo_)nome', NOW())";
            $query = $con->query("insert  into arquivo values (null, 'nomes[$i]', NOW())");
            if(mysqli_affected_rows($con) > 0){ 
                //$msg = "<script language='JavaScript' charset='utf-8'>alert('Arquivo enviado com sucesso!.');window.history.go(-1);</script>";
                $_SESSION['sucesso'] = 'Arquivo(s) enciado(s) com sucesso!';
                $destino = header("Location:../");
            }
            else{ 
                //$msg = "<script language='JavaScript' charset='utf-8'>alert('Falha ao enviar arquivo!.');window.history.go(-1);</script>";
                $_SESSION['erro'] = 'Há arquivos que não foram enviados, por não obedecerem as normas do sistema';
                $destino = header ("Location:..;");
            }

        }
    }
     



?>
<html>
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<h1> Upload de Arquivo</h1>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    Arquivo: <input type="file" name="arquivo[]" multiple require >
    <input type="submit" value="Salvar">
</form>
<?php
    if (isset($_SESSION['erro'])){
        echo $_SESSION['erro'];
        session_unset();
    }elseif(isset($_SESSION['sucesso'])){
        echo $_SESSION['sucesso'];
        session_unset();
    }
    
?>
</html>