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
  include "../model/TipoIngresso.class.php";

  $operacao = null;
  if (isset($_POST["operacao"])) {
    $operacao = $_POST["operacao"];
  } else if (isset($_GET["operacao"])) {
    $operacao = $_GET["operacao"];
  }
  if ($operacao == "cadastrar_tipo_ingresso") {
    
    $ingresso = new TipoIngresso();

    $ingresso->id_evento = $_POST['id_evento'];
    $ingresso->descricao = $_POST['descricao'];
    $ingresso->valor = $_POST['valor'];
    $ingresso->vagas = $_POST['vagas'];
    if(isset($_POST['detalhes'])) {
      $ingresso->detalhes = $_POST['detalhes'];
    }

    echo $ingresso->id_evento, $ingresso->descricao, $ingresso->valor;
    $ingresso->inserir();
    //echo "<meta http-equiv='refresh' content='0;url=../view/meus_eventos.php'>"; 
  }

?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>