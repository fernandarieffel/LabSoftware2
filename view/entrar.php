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
        <div class="fundo">
        <div class="col-md-4">

          <div class="page-header">
            <h1>Entrar</h1>
          </div>

          <form role="form" method="post" action="../controller/EntrarController.php">

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="seu_email@mail.com" required>
            </div>
            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" name="senha" class="form-control" id="senha" placeholder="Informe sua senha" required>
            </div>
          
          <p><a href="#">Esqueceu sua senha?</a></p>
            <button type="submit" name="operacao" value="entrar" class="btn btn-success">Entrar</button>
          </form>
          
        </div>
        </div>
      </div>
    </div>


    

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>