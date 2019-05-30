<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Repositorio de TCC's</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="shortcut icon" href="assets/icons8-chapéu-de-formatura-48.png" type="image/x-icon">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style>
        #aviso{
          display: none;
        }
    </style>  
</head>
<body>
<?php 
   include_once('php/conexao.php');
   if(isset($_POST['cpf']) && isset($_POST['senha'])){
    
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $sql = "SELECT 
    ADM.NOME, ADM.CPF, ADM.SENHA, ADM.EMAIL, ADM.ENDERECO, ADM.ATIVA, ADM.PRIVILEGIO, ADM.CELULAR, ADM.RG, TURMA.ID, TURMA.NOME AS CURSO, TURMA.ADM
    FROM ADM
    INNER JOIN TURMA 
    GROUP BY ADM.CPF";
    $r = mysqli_query($envio, $sql);
    if($cont = mysqli_num_rows($r) > 0){
        while($row = mysqli_fetch_array($r)){
            if($cpf == $row['CPF'] && $senha == $row['SENHA'] && $row['ATIVA'] == 1){
              session_start();
              $_SESSION['ATIVA'] = true;
              $_SESSION['NOME'] = $row['NOME'];
              $_SESSION['TURMA'] = $row['TURMA'];
              $_SESSION['CPF'] = $row['CPF'];
              $_SESSION['SENHA'] = $row['SENHA'];
              $_SESSION['ENDERECO'] = $row['ENDERECO'];
              $_SESSION['EMAIL'] = $row['EMAIL'];
              $_SESSION['RG'] = $row['RG'];
              $_SESSION['CELULAR'] = $row['CELULAR'];
              $_SESSION['PRIVILEGIO'] = $row['PRIVILEGIO'];
              $_SESSION['ID'] = $row['ID'];

              if($row['PRIVILEGIO'] == 0){

                header('location:php/adm.php');
              }else{
                header('location:php/cordenador.php');
              }
            }else{
              echo "<script> $(document).ready(function(){ $('#login-modal').modal('show'); }); </script>";        
            }
        }
    }
   }
  
?>
  <!-- menu simples com botão de login -->
    <nav class="navbar navbar-light bg-dark">
        <a class="navbar-brand" href="#">
            <div class="row" style="margin-left: 20px;">
                <img src="assets/icons8-chapéu-de-formatura-48.png">
                <h4 style="color: white; margin-left:10px; margin-top:6px;">Repositorio de TCC</h4>
            </div>
        </a>
        <input type="text" class="form-control col-6" style="margin-left: -100px;" placeholder="Busque por...">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">Login</button>
            <a href="php/postar.php"><button type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Postar tcc">
                Postar  
            </button></a>
        </div>
    </nav>

  <!-- janela modal de login -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Logar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form action="index.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">CPF</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="cpf" aria-describedby="emailHelp" placeholder="Digite seu CPF" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="senha" placeholder="Senha" required>
                        </div>                    
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </form>
            </div>
          </div>
        </div>
      </div>
<!--- janela modal de erro -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="fonte">Erro!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="funcao()"> 
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Login ou senha incorretos 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Tentar novamente</button>
        </div>
    </div>
</div>
</div>
      

<script>
    $('#tcc').change(function(){
            var valor = $('#tcc').val();
            var str = valor.substr(length-4);
            if(str != '.pdf'){
                $('#tcc').css('borderColor', 'red');
                $('#aviso').show('slow');
            }else{
                $('#tcc').css('borderColor', 'green')
                $('#aviso').hide('slow');

            }
        });
</script>
</body>
</html>