<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../assets/icons8-chapéu-de-formatura-48.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/css.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <title>Postar</title>
    <style>
       #menu{
           height: 50px;
           width: 100%;
       }
       h2{
           color: white;
           position: relative;
           margin: 0 auto;

       }
       .seta{
           line-height: 50px;
           height: 40px;
           width: 40px;
       }
       .config{
           height: 40px;
           width: 40px;
           line-height: 50px;
       }
       .titulo{
           color:black;
           margin-left: -40px;
       }
       .container{
        margin-left: 400px;
        margin-top: 50px;           
       }
       #aviso{
           width: 550px;
       }
       @media(max-width: 900px){
            .container{
                margin-left: 200px;
            }
            .titulo{
               font-size: 25px;
               margin-left: -40px;
           }
       }
       @media(max-width: 650px){
           .container{
               margin-left: 100px;
           }
           .titulo{
               font-size: 25px;
               margin-left: -40px;
           }
        }
        @media(max-width: 450px){
            .container{
                margin-left: 80px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-dark" id="menu">
        <a href="../index.php"><img src="../assets/icons8-esquerda-filled-50.png" class="seta"></a>
        <h2>Aluno</h2>
    </nav>
    <div class="container">
    <!-- formulario de cadastro de aluno -->
    <h2 class="titulo">Cadastro de aluno:</h2>
    <form class="form" method="POST" action="cadastroTCC.php" enctype="multipart/form-data">
        <label>Matricula</label>
        <input type="text" name="matricula" placeholder="Digite sua matricula" class="form-control col-6">
        <label>TCC</label>
        <input type="file" name="tcc" id="tcc" class="form-control col-6">
        <div class="alert alert-danger" id="aviso">Escolha um arquivo com formato .pdf</div>
        <br>
        <input type="submit" class="btn btn-primary" value="cadastrar">    
    </form>
    </div> 
    <!-- janela modal de sucesso -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header cabecalho-sucesso">
         <h5 class="modal-title" id="fonte">Successo!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="funcao()"> 
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-success" role="alert">
                Cadastrado com sucesso!
            </div>        
        </div>
        <div class="modal-footer">
            <button type="button" id="carrega" class="btn btn-success" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Continuar cadastrando</button>
        </div>
    </div>
</div>
</div>
<!-- janela modal de erro -->
<div class="modal fade" id="erro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header cabecalho-erro">
         <h5 class="modal-title" id="fonte">Erro!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger">
                Erro ao cadastrar!
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Informações</button>
            <button type="button" id="funciona" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Ok!</button>
        </div>
    </div>
</div>
<!-- janela modal de explicação -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header cabecalho-info">
        <h5 class="modal-title" id="exampleModalLabel">O que pode estar errado?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul>
            <li>Apenas o campo curso não é obrigatório pois alunos de escolas regulares não fazem parte de nenhum, verifique se estão todos preenchidos da forma correta;</li>
            <li>A matricula é a identificação aluno, um número aleatorio gerado no momento da inscrição do aluno, verifique se este número está correto;</li>
            <li>Caso o aluno não esteja matriculado em nenhuma escola não será possivel o cadastramento;</li>
            <li>O tcc deve estar no formato .pdf, caso não esteja não será possivel o cadastramento;</li>
        </ul>       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="teste" data-dismiss="modal">Tentar novamente</button>
      </div> 
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    $('#tcc').change(function(){
            var valor = $('#tcc').val();
            var str = valor.substr(length-4);
            if(str != '.pdf'){
                $('#tcc').css('borderColor', 'red');
                $('#aviso').show('slow');
            }else{
                $('#tcc').css('borderColor', 'green')
                $('#aviso').hide('slow');

            };
        });
    });
</script>
<?php 
 $retorno = $_GET['resultado'];
if($retorno != 0){
    if($retorno == 1){
        echo "<script> $(document).ready(function(){ $('#login-modal').modal('show'); }); </script>";        
    }else{
        echo "<script> $(document).ready(function(){ $('#erro').modal('show'); }); </script>";
    }
}
?>
</body>
</html>