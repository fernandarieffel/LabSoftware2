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
    <script src="../js/jquery-3.2.1.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.tablesorter.min.js"></script>   
</head>
<body>

<?php include 'menu.php';?>


    <div class="container">

      <div class="row">

        <div class="col-md-12">

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
              <li class="list-group-item"><a href="meus_eventos.php">Meus eventos</a></li>
              <li class="list-group-item"><a href="cadastrar_evento.php">Cadastrar evento</a></li>
              <li class="list-group-item"><i class="fa fa-user-o fa-fw" aria-hidden="true"></i> <b>Minha conta</b></li>
              <li class="list-group-item"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i></i> <b>Sair</b></li>
            </ul>

          </div>
        </div>


          <div class="col-md-10">

          <?php
            $id_evento = $_GET['id_evento'];
            $nome_evento = $_GET['nome_evento']; 
          ?>
            
          

          <h2 class="titulo">Painel de Gerenciamento de Evento</h2>
          <h1><?php echo $nome_evento;?></h1>

          <p><a class="btn btn-primary" href="editar_evento.php?id_evento=<?php echo $id_evento?>">Editar informações</a>
           <a href="cadastrar_tipo_ingresso.php?id_evento=<?php echo $id_evento?>&nome_evento=<?php echo $nome_evento?>" class="btn btn-success">Novo Ingresso</a></p>

          <br>

          <h3><i class="fa fa-tags" aria-hidden="true"></i> Ingressos</h3>

          
            <table class="tablesorter table table-hover table-bordered">
              <thead>
                <tr>
                  <th><i class="fa fa-sort" aria-hidden="true"></i> Descrição</th>
                  <th><i class="fa fa-sort" aria-hidden="true"></i> Valor</th>
                  <th><i class="fa fa-sort" aria-hidden="true"></i> Vagas</th>
                  <th><i class="fa fa-sort" aria-hidden="true"></i> Qtd. inscritos</th>
                  <th><i class="fa fa-sort" aria-hidden="true"></i> Qtd. restante</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  include "../model/ConexaoDB.class.php";
                  include "../model/TipoIngresso.class.php";

                  
                  $tipoIngresso = new TipoIngresso;
                  $ingressos = $tipoIngresso->listar($id_evento);

                  while ($linha = mysqli_fetch_assoc($ingressos)) {
                    $id = $linha['id'];
                    $descricao = $linha['descricao'];
                    $valor = $linha['valor'];
                    $vagas = $linha['vagas'];
                    $qtd_vendida = $linha['qtd_vendida'];
                    $detalhes = $linha['detalhes'];
                    $restante = $valor - $qtd_vendida;
                    
                    echo '<tr>
                            <td>'.$descricao.'</td>
                            <td>'.$valor.'</td>
                            <td>'.$vagas.'</td>
                            <td>'.$qtd_vendida.'</td>
                            <td>'.$restante.'</td>
                            <td><a href="../view/editar_tipo_ingresso.php?id_evento='.$id_evento.'&nome_evento='.$nome_evento.'&id='.$id.'&descricao='.$descricao.'&valor='.$valor.'&vagas='.$vagas.'&detalhes='.$detalhes.'" style="color: blue;"><i class="fa fa-edit" aria-hidden="true"></a></td>
                            

                            <td><a href="../controller/TipoIngressoController.php?operacao=excluir?id_tipo_ingresso='.$id.'" style="color: red;"><i class="fa fa-remove" aria-hidden="true"></a></td>
                          </tr>';

                  }
                ?>

              </tbody>
            </table>
          





          <br>
          <h3><i class="fa fa-users" aria-hidden="true"></i> Lista de inscritos</h3>

          <form class="form-inline">
            <div class="form-group">
              <label for="exampleInputName2"></label>
              <input type="text" class="form-control" id="exampleInputName2" placeholder="Pesquisar congressistas">
            </div>
            <button type="submit" class="btn btn-default">Pesquisar</button>
          </form>

          <br>

          <form class="form-inline" role="form" method="post" action="../controller/InscricaoController.php" enctype="multipart/form-data">
            <input type="hidden" name="id_evento" value="<?php echo $_GET['id_evento']?>">
            <input type="hidden" name="nome_evento" value="<?php echo $_GET['nome_evento']?>">
            <div class="table-responsived">

              <table class="tablesorter table table-hover table-bordered">

                <thead>
                  <tr>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Nome</th>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Instituição</th>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Estado</th>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Ingresso</th>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Pagamento</th>
                    <th><i class="fa fa-sort" aria-hidden="true"></i> Presença</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  include "../model/Inscricao.class.php";
                  
                  $inscricao = new Inscricao();
                  $res = $inscricao->listarInscritosByIdEvento($id_evento);

                  while($linha = mysqli_fetch_assoc($res)) {
                    $id_inscricao = $linha['id_inscricao'];
                    $id_congressista = $linha['id_congressista'];
                    $nome = $linha['nome'];
                    $instituicao = $linha['instituicao'];
                    $estado = $linha['estado'];
                    $email = $linha['email'];
                    $ingresso = $linha['descricao'];
                    $pagamento = $linha['pagamento'];
                    $presenca = $linha['presenca'];

                    echo '
                    <tr>
                      <td><button type="button" class="btn btn-link" data-toggle="modal" data-target=".modal'.$id_congressista.'">'.$nome.'</button>';
                            echo 
                            '<div class="modal fade modal'.$id_congressista.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">'.$nome.'</h4>
                                </div>
                                <div class="modal-body">
                                  <p><b></b></p>
                                </div>
                             </div>
                           </div>
                         </div>';

                    echo  
                    '</td>
                      <td>'.$instituicao.'</td>
                      <td>'.$estado.'</td>
                      <td>'.$ingresso.'</td>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" class="check_pagamento" name="pagamento[]" value="'.$id_inscricao.'">';
                             if ($pagamento == 'Aguardando') {
                              echo ' <b style="color: orange;">'.$pagamento.'</b>';
                             } else if ($pagamento == 'Confirmado') {
                              echo ' <b style="color: green;">'.$pagamento.'</b>';
                             } else if ($pagamento == 'Cancelado') {
                              echo ' <b style="color: red;">'.$pagamento.'</b>';
                             }
                            
                    echo '</label>
                        </div>
                      </td>
                      <td>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" class="check_presenca" name="presenca[]" value="'.$id_inscricao.'">';
                            if ($presenca == 'Pendente') {
                              echo ' <b style="color: orange;">'.$presenca.'</b>';
                            } else if ($presenca == 'Presente') {
                              echo ' <b style="color: green;">'.$presenca.'</b>';
                            } else if ($presenca == 'Ausente') {
                              echo ' <b style="color: red;">'.$presenca.'</b>';
                            }
                    echo '</label>
                        </div>
                      </td>                      
                    </tr> ';

                  }

                  ?>
                </tbody>

                <tfoot>
                  <tr>
                    <td colspan="2"><b>Total de Inscritos</b></td>
                    <td colspan="2"><b><?php echo $inscricao->getNumTotalInscritos($id_evento)?></b></td>
                    <td>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="checkAllPagamento"> Selecionar todos
                        </label>
                      </div> <br><br>

                      <div class="form-group">
                        <select name="situacao_pagamento" class="form-control input-sm">
                          <option value="Aguardando"><b class="pagamento">Aguardando</b></option>
                          <option value="Confirmado"><b class="pagamento">Confirmado</b></option>
                          <option value="Cancelado"><b class="pagamento">Cancelado</b></option>
                        </select>
                      </div>
                      <button type="submit" name="operacao" value="set_pagamento" class="btn btn-default btn-sm">Aterar</button>

                    </td>
                    <td>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" id="checkAllPresenca"> Selecionar todos
                        </label>
                      </div> <br><br>

                      <div class="form-group">
                        <select name="situacao_presenca" class="form-control input-sm">
                          <option value="Presente"><b class="presenca">Presente</b></option>
                          <option value="Ausente"><b class="presenca">Ausente</b></option>
                          <option value="Pendente"><b class="presenca">Pendente</b></option>
                        </select>
                      </div>
                      <button type="submit" name="operacao" value="set_presenca" class="btn btn-default btn-sm">Aterar</button>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>

          </form>


    </div>
  </div>
</div>

<script type="text/javascript">

  $("#checkAllPagamento").click(function(){
    $('.check_pagamento').not(this).prop('checked', this.checked);
  });
  $("#checkAllPresenca").click(function(){
    $('.check_presenca').not(this).prop('checked', this.checked);
  });

  $("table").tablesorter(); 
  $("#trigger-link").click(function() { 
    // set sorting column and direction, this will sort on the first and third column the column index starts at zero 
    var sorting = [[0,0],[2,0]]; 
    // sort on the first column 
    $("table").trigger("sorton",[sorting]); 
    // return false to stop default link action 
    return false; 
  }); 


</script>
</body>
</html>