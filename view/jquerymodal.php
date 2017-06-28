<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Integrado de Eventos do MEJ</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">


   <script src="../js/jquery-3.2.1.min.js"></script>    
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
   <div>
     <?php
         $numero= $_GET ["numero"];
       
       session_start();
       if($numero == 1) {
     ?>
           <!-- Modal 1 -->
      <div class="modal fade bs-example-modal-sm" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
          
          <h4 class="modal-title" id="myModalLabel"><?php echo $_SESSION['mensagem'];?></h4>
          </div>
         
          <div class="modal-footer">
          <div class="text-center">
            <a class="btn botao" href="<?php echo $_SESSION['local'];?>">Ok</a>
          </div>          
          </div>
        </div>
        </div>
      </div>
      
      <script>
        $('document').ready(function(){
          $('#myModal1').modal('show');
          
        })
      </script>
     <?php
     
        }
        if($numero==2){
        $id = $_GET["id"];
      
     ?>
       <!-- Modal 2-->
      <div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
          
          <h4 class="modal-title text-center" id="myModalLabel">Deseja realmente excluir?</h4>
          </div>
         
          <div class="modal-footer">
           <form class="form-horizontal" role="form"  method="post" action="controla.php">
             <input type="hidden" name="id" value="<?php echo $id; ?>">
             <div class="text-center">
                       <input type="submit" class="btn btn-danger" name="operacao" value="Sim"/>           
             <a class="btn btn-primary" href=editarFuncionario.php?id=<?php echo $id ?>>Não</a>
             </div>
        </form> 
          </div>
        </div>
        </div>
      </div>
      
      <script>
        $('document').ready(function(){
          $('#myModal2').modal('show');
          
        })
      </script>
   <?php
      }
   ?>
   
   </div>
  </body>
</html>