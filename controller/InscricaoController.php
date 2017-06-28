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
  include "../model/Inscricao.class.php";

  $operacao = null;
  if (isset($_POST["operacao"])) {
    $operacao = $_POST["operacao"];
  } else if (isset($_GET["operacao"])) {
    $operacao = $_GET["operacao"];
  }

  if ($operacao == "inscrever-se") {
  
    $inscricao = new Inscricao();

    $ingresso = $_POST['id_tipo_ingresso'];
    $inscricao->id_tipo_ingresso = $ingresso;
    $inscricao->id_congressista = $_POST['id_usuario'];

    $inscricao->inserir();

    session_start();
    $_SESSION['mensagem']='Inscrição efetuada com sucesso! <br>Em, breve você receberá um email de confirmação.';
    $_SESSION['local']='meus_eventos_congressista.php';  
    echo "<meta http-equiv='refresh' content='0;url=../view/jquerymodal.php?numero=1'>"; 
  }

  else if ($operacao == "set_pagamento") {
  
    $inscricao = new Inscricao();

    $pagamento = $_POST['pagamento'];
    $situacao_pagamento = $_POST['situacao_pagamento'];

    foreach ($pagamento as $pagamentos => $id_inscricao) {
      $inscricao->setPagamento($id_inscricao, $situacao_pagamento);
    }
 
    echo "<meta http-equiv='refresh' content='0;url=../view/painel.php?id_evento=".$_POST['id_evento']."&nome_evento=".$_POST['nome_evento']."'>";
  }

  else if ($operacao == "set_presenca") {
  
    $inscricao = new Inscricao();

    $presenca = $_POST['presenca'];
    $situacao_presenca = $_POST['situacao_presenca'];

    foreach ($presenca as $presencas => $id_inscricao) {
      $inscricao->setPresenca($id_inscricao, $situacao_presenca);
    }
 
    echo "<meta http-equiv='refresh' content='0;url=../view/painel.php?id_evento=".$_POST['id_evento']."&nome_evento=".$_POST['nome_evento']."'>";
  }

?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>