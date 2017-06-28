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
        <h3>Perfil Organizador</h3><br>
        <p>Os campos marcados com  <b class="obrigatorio">*</b>  são de preencimento obrigatório.</p> <br>

        <form role="form" method="post" action="../controller/OrganizadorController.php?operacao=criar_conta_organizador">

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
              <label for="instituicao">Instituição <b class="obrigatorio">*</b></label>
              <input type="text" name="instituicao" class="form-control" id="instituicao" placeholder="Informe a sua instuituição">
            </div>
            <p>Tipo de instituição  <b class="obrigatorio">*</b></p>
            <div class="radio">
              <label>
                <input type="radio" name="tipoInstituicao" value="Empresa Junior">Empresa Júnior
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="tipoInstituicao" value="Nucleo">Núcleo
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="tipoInstituicao" value="Federacao">Federação
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="tipoInstituicao" value="Confederacao">Confederação
              </label>
            </div>
            

          </div>

          <div class="col-md-6">
          
            <div class="form-group">
              <label for="cnpj">CNPJ <b class="obrigatorio">*</b></label>
              <input type="text" name="cnpj" class="form-control" id="cnpj" placeholder="00.000.000/0000-00">
            </div>
            <div class="form-group">
              <label for="endereco">Endereço <b class="obrigatorio">*</b></label>
              <input type="text" name="endereco" class="form-control" id="endereco" placeholder="Informe o endereço" required>
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
              <label for="telefone">Telefone <b class="obrigatorio">*</b></label>
              <input type="text" name="telefone" class="form-control" id="telefone" placeholder="(99)9999-9999" required>
            </div>  
            
            <button type="submit" name="operacao" value="criar_conta_organizador" class="btn btn-success pull-right">Criar conta</button>

          </div>
        </form>

      </div>
    </div>
  </div>

<script src="../js/jquery-3.2.1.min.js"></script>    
<script src="../js/bootstrap.min.js"></script>

</body>
</html>