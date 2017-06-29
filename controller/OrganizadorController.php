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
  include "../model/Organizador.class.php";

  $operacao = $_POST["operacao"];
  $operacao = null;
  if (isset($_POST["operacao"])) {
    $operacao = $_POST["operacao"];
  } else if (isset($_GET["operacao"])) {
    $operacao = $_GET["operacao"];
  }

  if ($operacao == "criar_conta_organizador") {

    $organizador = new Organizador();

    $instituicao = $_POST["instituicao"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipoInstituicao = $_POST["tipoInstituicao"];
    $cnpj = $_POST['cnpj'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $telefone = $_POST['telefone'];

    if(isset($_POST['complemento'])) {
        $organizador->complemento = $_POST['complemento'];
    }
    $organizador->instituicao = $instituicao;
    $organizador->cnpj = $cnpj;
    $organizador->endereco = $endereco;
    $organizador->telefone = $telefone;
    $organizador->email = $email;
    $organizador->senha = $senha;
    $organizador->tipoInstituicao = $tipoInstituicao;

    $organizador->inserir();
    $usuario_organizador = mysqli_fetch_assoc($organizador->entrar());

    $tipo = 'Organizador';
    $id = $usuario_congressista['id'];
    $nome=$usuario_congressista['nome'];

    session_start();
    $_SESSION['tipo_usuario'] = $tipo;
    $_SESSION['usuario'] = $nome;
    $_SESSION['id_usuario'] = $id;

    $_SESSION['mensagem']='Cadastro efetuado com sucesso!';
    $_SESSION['local']='meus_eventos_organizador.php';         

    echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>";
  }
?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>