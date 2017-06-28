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
  //Logout
  $sair = $_GET['sair'];

  if ($sair == "true") {
    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['id_usuario']);
    unset($_SESSION['tipo_usuario']);
    unset($_SESSION['mensagem']);
    unset($_SESSION['local']);
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;url=../view/entrar.php'>";
  }
?>


<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>