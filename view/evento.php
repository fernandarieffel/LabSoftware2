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

    	<div class="row">

<?php
  include "../model/ConexaoDB.class.php";
  include "../model/Evento.class.php";
  include "../model/TipoIngresso.class.php";
  include "../model/Inscricao.class.php";
  
  $evento = new Evento();
  $res = $evento->listarEventoById($_GET['id']);

  while($linha = mysqli_fetch_assoc($res)) {
    $id_evento = $linha['id'];
    $nome = $linha['nome'];
    $descricao = $linha['descricao'];
    $dataRealizacao = $linha['dataRealizacao'];
    $local = $linha['local'];

    echo '<div class="col-md-12">';
    echo '<div class="col-md-7">';
    echo '<h1>'.$nome.'</h1>';
    echo '<h4><b>'.$dataRealizacao.'</b></h4>';
    echo '<h4>'.$local.'</h4><br>';
    echo '<p>'.$descricao.'</p>';
    echo '</div>';    
    
    $tipoIngresso = new TipoIngresso();
    $ingressos = $tipoIngresso->listarTipoIngressoByIdEvento($id_evento);

    //inicio form
    echo '<div class="col-md-4 col-md-offset-1 thumbnail ingressos">';
    echo '<h3>Ingressos</h3> <br>';
    echo '<form role="form" method="post" action="../controller/InscricaoController.php">';
    echo '<input type="hidden" name="id_usuario" value="'.$id_usuario.'">';

    while ($li = mysqli_fetch_assoc($ingressos)) {
      $id_tipo_ingresso = $li['id'];
      $desc = $li['descricao'];
      $valor = $li['valor'];

      $inscricao = new Inscricao;
      $existeVagas = $inscricao->verificaVagasDisponiveis($id_tipo_ingresso);

      echo '<div class="radio">
              <label>';

      if($existeVagas == true) {
      echo     '<h4><input type="radio" name="id_tipo_ingresso" value="'.$id_tipo_ingresso.'" required><b>R$ '.$valor.'</b> - '.$desc.'</h4>';
      } else if($existeVagas == false) {
      echo     '<h4><input type="radio" name="id_tipo_ingresso" value="'.$id_tipo_ingresso.'" disabled><b>R$ '.$valor.'</b> - '.$desc.' (ESGOTADO)</h4>';
      }
      echo   '</label>
            </div>';
    }
    if ($tipo_usuario == 'Congressista') {
      echo '<br><a type="button" value="inscrever-se" class="btn btn-default btn-lg botao" data-toggle="modal" data-target=".confirmacao">Inscrever-se</a>';
    } else {
      echo '<br><button type="submit" name="operacao" disabled="disabled" class="btn btn-default btn-lg botao">Inscrever-se</button>';
      echo '<p>Entre com uma conta de congressista para poder se inscrever.</p>';
    }

      echo '<!-- Small modal -->
      <div class="modal fade confirmacao" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4>Você tem certeza que deseja inscrever-se no evento <b>'.$nome.'</b>?</h4><br>
              <button type="submit" name="operacao" value="inscrever-se" class="btn btn-success">Sim</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>';
    
    echo '</form>';
    echo '</div>';    
    //fim form
    echo '</div>';
    echo '</div>';
    } 
?>

    	</div>
    </div>
    

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>
</body>
</html>