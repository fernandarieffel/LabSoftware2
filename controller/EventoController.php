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
  include "../model/Evento.class.php";

  $operacao = null;
  if (isset($_POST["operacao"])) {
    $operacao = $_POST["operacao"];
  } else if (isset($_GET["operacao"])) {
    $operacao = $_GET["operacao"];
  }

  if ($operacao == "cadastrar_evento") {

    $evento = new Evento();

    $evento->id_organizador = $_POST['id_organizador'];
    $evento->local = $_POST['local'];
    $evento->nome = $_POST['nome'];
    $evento->dataRealizacao = $_POST['dataRealizacao']
    $evento->cargaHoraria = $_POST['cargaHoraria'];
    $evento->periodoInscricao = $_POST['periodoInscricao'];
    
    $evento->descricao = $_POST["descricao"];

    if (isset($_FILES['imagem'])) {
    //imagem
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio = "../resorces/img/";

    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

    $evento->imagem = $novo_nome;

    }

    $evento->inserir();
    $_SESSION['mensagem']='Evento cadastrado com sucesso!';
    $_SESSION['local']='meus_eventos.php';         

    echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>";
  }
?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>