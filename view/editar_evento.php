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
    <div class="col-md-12">

      <h1>Editar Evento</h1><br>
      <p>Os campos marcados com  <b class="obrigatorio">*</b>  são de preencimento obrigatório.</p> <br>

      <form role="form" method="post" action="../controller/EventoController.php" enctype="multipart/form-data">

    <?php
    include "../model/ConexaoDB.class.php";
    include "../model/Evento.class.php";
    
    $evento = new Evento();
    $res = $evento->listarEventoById($_GET['id_evento']);

    $linha = mysqli_fetch_assoc($res);
    $id_evento = $linha['id'];
    $nome = $linha['nome'];
    $descricao = $linha['descricao'];
    $dataRealizacao = $linha['dataRealizacao'];
    $local = $linha['local'];
    $cargaHoraria = $linha['cargaHoraria'];
    $imagem = $linha['imagem'];
    $periodoInscricao = $linha['periodoInscricao'];
    $descricao = $linha['descricao'];

    ?>


        <div class="col-md-6">
          <input type="hidden" name="id_evento" value="<?php echo $id_evento?>">
          <div class="form-group">
            <label for="nome">Nome <b class="obrigatorio">*</b></label>
            <input type="text" name="nome" value="<?php echo $nome?>" class="form-control" id="nome" placeholder="Informe o seu nome" required>
          </div>
          <div class="form-group">
            <label for="local">Local <b class="obrigatorio">*</b></label>
            <input type="text" name="local" value="<?php echo $local?>" class="form-control" id="local" placeholder="Informe o local" required>
          </div>
          <div class="form-group">
            <label for="dataRealizacao">Data em que ocorrerá o evento <b class="obrigatorio">*</b></label>
            <input type="text" name="dataRealizacao" value="<?php echo $dataRealizacao?>" class="form-control" id="dataRealizacao" placeholder="Escreva por extenso. Ex.: 1 a 3 de maio de 2017" required>
          </div>
          <div class="form-group">
            <label for="cargaHoraria">Carga horária <b class="obrigatorio">*</b></label>
            <input type="number" name="cargaHoraria" value="<?php echo $cargaHoraria?>" class="form-control" id="local" placeholder="Informe a carga horária" required>
          </div>

        </div>

          <div class="col-md-6">

            <div class="form-group">
              <label for="imagem">Imagem <b class="obrigatorio">*</b></label>
              <input type="file" id="imagem" name="imagem" value="<?php echo '../uploads/img/'.$imagem?>" required>
              <p class="help-block">Somente arquivos .jpg ou .png</p>
            </div>
          <div class="form-group">
            <label for="periodoInscricao">Período de inscrições <b class="obrigatorio">*</b></label>
            <input type="text" name="periodoInscricao" value="<?php echo $periodoInscricao?>" class="form-control" id="periodoInscricao" placeholder="Escreva o período por extenso" required>
          </div>
          
          <div class="form-group">
            <label for="descricao">Descrição <b class="obrigatorio">*</b></label>
            <textarea name="descricao" class="form-control" value="<?php echo $descricao?>" id="descricao" placeholder="Informe a descrição" rows="4" required></textarea>
          </div>
          <button type="submit" name="operacao" value="editar" class="btn btn-success pull-right">Salvar</button>


        </div>
      </form>
    </div>
  </div>
</div>

    

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

<script>
  $('#imagem').change(function() {

    var val = $(this).val();

    switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
        case 'jpg': case 'png':
            break;
        default:
            $(this).val('');
            // error message here
            alert("O arquivo não é uma imagem! Utilize apenas arquivos .jpg, .png ou .jpeg");
            break;
    }
  });
</script>
</body>
</html>