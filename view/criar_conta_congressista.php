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
          <h1>Criar conta </h1>
          <h3>Perfil Congressista</h3><br>
          <p>Os campos marcados com  <b class="obrigatorio">*</b>  são de preencimento obrigatório.</p> <br>

          <form role="form" method="post" action="../controller/CongressistaController.php">

            <div class="col-md-6">
              <div class="form-group">
                <label for="email">E-mail <b class="obrigatorio">*</b></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="seu_email@mail.com" required>
              </div>
              <div class="form-group">
                <label for="senha">Senha <b class="obrigatorio">*</b></label>
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Informe sua senha" required>
              </div>
              <div class="form-group">
                <label for="nome">Nome <b class="obrigatorio">*</b></label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Informe o seu nome" required>
              </div>
              <div class="form-group">
                <label for="instituicao">Instituição (Empresa júnior/Núcleo/Federação) <b class="obrigatorio">*</b></label>
                <input type="text" name="instituicao" class="form-control" id="instituicao" placeholder="Informe a sua instituição" required>
              </div>
              <div class="form-group">
                <label for="rg">RG <b class="obrigatorio">*</b></label>
                <input type="text" name="rg" class="form-control" id="rg" placeholder="Informe o seu RG" required>
              </div>
              <div class="form-group">
                <label for="CPF">CPF <b class="obrigatorio">*</b></label>
                <input type="text" name="cpf" class="form-control" id="rg" placeholder="Informe o seu CPF" required>
              </div>

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="endereco">Endereço <b class="obrigatorio">*</b></label>
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Informe o seu endereco" required>
              </div>
              <div class="form-group">
                <label for="numero">Número <b class="obrigatorio">*</b></label>
                <input type="text" name="numero" class="form-control" id="numero" placeholder="Informe o número" required>
              </div>
              <div class="form-group">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Informe o complemento">
              </div>
              <div class="form-group">
                <label for="cidade">Cidade <b class="obrigatorio">*</b></label>
                <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Informe a cidade" required="required">
              </div>
              <div class="form-group">
                <label for="estado">Estado <b class="obrigatorio">*</b></label>
                <input type="text" name="estado" class="form-control" id="estado" placeholder="Informe a sigla do estado" required>
              </div>
              <div class="form-group">
                <label for="telefone">Telefone <b class="obrigatorio">*</b></label>
                <input type="text" name="telefone" class="form-control" id="telefone" placeholder="(99)99999-9999" required>
              </div>
              
              <button type="submit" name="operacao" value="criar_conta_congressista" class="btn btn-success pull-right">Criar conta</button>
            </div>            
          </form>

        </div>
      </div>
    </div>
  </div>

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>