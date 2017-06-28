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

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="principal.php">Sistema Integrado de Eventos do MEJ</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="principal.php">INÍCIO</a></li>
            <li><a href="">SOBRE</a></li>
            <li><a href="">EVENTOS</a></li>
            
<?php    
  session_start();
  $usuario = null;
  $id_usuario = null;
  $tipo_usuario = null;

  if(isset($_SESSION['usuario'] ) and isset($_SESSION['id_usuario'])){
    $usuario = $_SESSION['usuario'];
    $id_usuario = $_SESSION['id_usuario'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OLÁ <b>'.$usuario.'</b> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="meus_eventos.php">MEUS EVENTOS</a></li>
                <li role="separator" class="divider"></li>
              </ul>
            </li>';
    echo '<li><a href="../controller/SairController.php?sair=true">SAIR</a></li>';
  }

  else {
    echo "<meta http-equiv='refresh' content='0;url=../view/entrar.php'>"; 
    echo '<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CRIAR CONTA <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="criar_conta_congressista.php">Congressista</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="criar_conta_organizador.php">Organizador</a></li>
              </ul>
            </li>';
    echo '<li><a href="entrar.php">ENTRAR</a></li>';
  }
?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



    <div class="container">

    	<div class="row">

        <div class="col-md-2">
          
          <div class="panel panel-primary menu-side">
            <!-- Default panel contents -->
            <div class="panel-heading">
              <h5>Olá <b><?php echo $usuario?></b></h5>
              <p>Perfil <?php echo $tipo_usuario?></p>
            </div>
            <!-- List group -->
            <ul class="list-group">
              <li class="list-group-item"><i class="fa fa-laptop fa-fw" aria-hidden="true"></i> <b>Eventos</b></li>
              <li class="list-group-item">Meus eventos</li>
              <li class="list-group-item"><a href="cadastrar_evento.php">Cadastrar evento</a></li>
              <li class="list-group-item"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i> <b>Minha conta</b></li>
              <li class="list-group-item">Meus dados</li>
              <li class="list-group-item"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i></i> <b>Sair</b></li>
            </ul>

          </div>
        </div>

        

        <div class="col-md-10">

          <div class="page-header">
            <h1>Meus Eventos</h1>
          </div>

<?php
include "../model/ConexaoDB.class.php";
include "../model/Evento.class.php";


$res = null;

$evento = new evento();
$res = $evento->listarPorOrganizador($_SESSION['id_usuario']);

while($linha = mysqli_fetch_assoc($res)) {
  $id = $linha['id'];
  $nome = $linha['nome'];
  $dataInicio = $linha['dataInicio'];
  $local = $linha['local'];
  $descricao = $linha['descricao'];
  if($linha['imagem'] != null) {
    $imagem = $linha['imagem'];
  } else {
    $imagem = 'image.png';
  }

  echo '<div class="col-md-6 thumbnail">';
  echo '<div class="col-md-4">';
  echo '<img src="../resorces/img/'.$imagem.'" class="img-responsive" alt="imagem-evento">';
  echo '</div>';
  echo '<div class="col-md-8">';
  echo '<h3>'.$nome.'</h3>';
  echo '<p>'.$dataInicio.'</p>';
  echo '<p>'.$local.'</p>';
  echo '<p><a class="btn btn-primary" href="painel.php?id_evento='.$id.'&nome_evento='.$nome.'" role="button">Gerenciar</a>   &nbsp&nbsp&nbsp';
  echo '<a class="btn btn-success" href="cadastrar_tipo_ingresso.php?id_evento='.$id.'&nome_evento='.$nome.'" role="button">+ Novo ingresso</a></p>';
  echo '</div>';
  echo '</div>';
}   
?>
        </div>

    	</div><!--fecha row-->
    </div><!--fecha container-->
<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>
</body>
</html>