<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Integrado de Eventos do MEJ</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>

<?php include 'menu.php';?>

    <div class="container">

      <div class="row inicio">
        <h1 class="titulo">Bem vindo ao sistema de eventos do Movimento Empresa Júnior!</h1><br>
        <h3>Eventos Destaque</h3><br>
      </div>

      <div class="row">

<?php
  include "../model/ConexaoDB.class.php";
  include "../model/Evento.class.php";
  
  $evento = new evento();

  $res = $evento->listar();

  while($linha = mysqli_fetch_assoc($res)) {
    $id = $linha['id'];
    $nome = $linha['nome'];
    $dataRealizacao = $linha['dataRealizacao'];
    $local = $linha['local'];
    $descricao = $linha['descricao'];

    if($linha['imagem'] != null) {
      $imagem = $linha['imagem'];
    } else {
      $imagem = 'image.png';
    }

    echo '<div class="col-md-4">';
      echo '<div class="evento thumbnail">';
        echo '<img src="../uploads/img/'.$imagem.'" class="img-responsive img-thumbnail" alt="imagem-evento">';
        echo '<div class="caption">';
          echo '<h3>'.$nome.'</h3>';
          echo '<h4><b>'.$dataRealizacao.'</b></h4>';
          echo '<h4>'.$local.'</h4>';
          echo '<p><a class="btn btn-lg btn-default botao" href="evento.php?id='.$id.'" role="button">Inscrever-se</a></p>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
  }     
?>
      </div>

      <div class="row">
        <div class="col-md-12">
          <br>
          <p class="text-center"><a class="btn btn-default btn-lg" href="#" role="button">Ver todos os eventos</a></p>      
        </div>
    	</div><!--fecha row-->
    </div><!--fecha container-->    

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>
</body>
</html>