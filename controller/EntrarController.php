<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Integrado de Eventos do MEJ</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<?php
  include "../model/ConexaoDB.class.php";
  include "../model/Congressista.class.php";
  include "../model/Organizador.class.php";

  $operacao = $_POST["operacao"];

  if ($operacao == "entrar") {

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Se for congressista
    $congressista = new Congressista();
    $congressista->email = $email;
    $congressista->senha = $senha;  
    $usuario_congressista = mysqli_fetch_assoc($congressista->entrar());

    //Se for organizador    
    $organizador = new Organizador();
    $organizador->email = $email;
    $organizador->senha = $senha;      
    $usuario_organizador = mysqli_fetch_assoc($organizador->entrar());

    if ($usuario_congressista) {
        $tipo = 'Congressista';
        $id = $usuario_congressista['id'];
        $nome=$usuario_congressista['nome'];

        session_start();
        $_SESSION['tipo_usuario'] = $tipo;
        $_SESSION['usuario'] = $nome;
        $_SESSION['id_usuario'] = $id;

        $_SESSION['mensagem']='Login efetado com sucesso!';
        $_SESSION['local']='meus_eventos.php';         

        echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>";
    }
    else if ($usuario_organizador) {          
        $tipo = 'Organizador';
        $id = $usuario_organizador['id'];
        $instituicao=$usuario_organizador['instituicao'];

        session_start();
        $_SESSION['tipo_usuario'] = $tipo;
        $_SESSION['usuario'] = $instituicao;
        $_SESSION['id_usuario'] = $id;

        $_SESSION['mensagem']='Login efetado com sucesso!';
        $_SESSION['local']='meus_eventos.php';         

        echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>";
    }
    else {
        session_start();
        $_SESSION['mensagem']='Usuário ou senha incorretos! <br>Tente novamente.';
        $_SESSION['local']='entrar.php';         

        echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>"; 
    }

}
?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>