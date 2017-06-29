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

            <h1>Cadastrar Ingresso</h1>
            <h3><?php echo $_GET['nome_evento'];?></h3><br>
          <p>Os campos marcados com  <b class="obrigatorio">*</b>  são de preencimento obrigatório.</p> <br>

          <form role="form" method="post" action="../controller/TipoIngressoController.php">

          <div class="col-md-6">
            <input type="hidden" name="id_evento" value="<?php echo $_GET['id_evento'];?>">
            <div class="form-group">
              <label for="descricao">Descrição <b class="obrigatorio">*</b></label>
              <input type="text" name="descricao" class="form-control" id="descricao" placeholder="Informe a descrição do ingresso" required>
            </div>
            <div class="form-group">
              <label for="valor">Valor <b class="obrigatorio">*</b></label>
              <input type="number" name="valor" class="form-control" id="valor" placeholder="R$ 0,00" required>
            </div>
            <div class="form-group">
              <label for="vagas">Vagas <b class="obrigatorio">*</b></label>
              <input type="number" name="vagas" class="form-control" id="vagas" placeholder="00" required>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="detalhes">Detalhes</label>
              <textarea type="text" name="detalhes" rows="5" class="form-control" id="detalhes" placeholder="Informe os detlhes do ingresso"></textarea>
            </div>

            <button type="submit" name="operacao" value="cadastrar_tipo_ingresso" class="btn btn-success">Cadastrar</button>
          </div>

            
            
          </form>
          
        </div>
      </div>
    </div>

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>