<?php
  include('conexao.php');

  if(isset($_POST['email']) || isset($_POST['senha'])){
      if(strlen($_POST['email'])==0){
          echo "<script language='JavaScript' charset='utf-8'>alert('Campo email vazio!.');window.history.go(-1);</script>";
      }else if (strlen($_POST['senha'])==0){
        echo "<script language='JavaScript' charset='utf-8'>alert('Campo senha vazio!!.');window.history.go(-1);</script>";
      } else{
          $email= $mysqli -> real_escape_string($_POST['email']);
          $senha= $mysqli -> real_escape_string($_POST['senha']);

          $sql_code = " SELECT * FROM usuarios WHERE email = '$email' AND senha='$senha'";
          $sql_query = $mysqli -> query($sql_code) or die("Falha na execução do código SQL: " - $mysqli->error);
          $quantidade = $sql_query->num_rows;
          if($quantidade == 1){
                $usuario = $sql_query->fetch_assoc();

                if(isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: indexuser.php");
          }else{
              echo "<script language='JavaScript' charset='utf-8'>alert('Falha ao logar: E-mail ou senha incorretos');window.history.go(-1);</script>";
          }
      }
  }
?>
<html>

<head>
    <title> Show My Slide </title>
    <link rel="stylesheet" type="text/css" href="../CSS/main.css">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
</head>

<body>

    <div class="acima"></div>
    <header class="cabecalio">
        <div class="menu-user">
            <a href="../HTML/index.php"><img src="../img/barnes-logo-color.png" class="img1"></a>
            

        </div>
    </header>
    <div class="abaixo"></div>
    <div class="login-page">
        <div class="form">
            <form class="register-form" action="" method="POST">
                <input type="text" placeholder="email" name="email"/>
                <input type="password" placeholder="senha" name="senha" />
                <input type="text" placeholder="email" />
                <button type="submit">create</button>
                <p class="message">Already registered? <a href="#">Sign In</a></p>
            </form>
            <form class="login-form" action="" method="POST">
                <input type="text" placeholder="email" name="email"/>
                <input type="password" placeholder="senha" name="senha"/>
                <button type="submit">login</button>

            </form>
        </div>
    </div>
    <script>
    $('.message a').click(function() {
        $('form').animate({
            height: "toggle",
            opacity: "toggle"
        }, "slow");
    });
    </script>
</body>

</html>