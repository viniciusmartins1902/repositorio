<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../assets/icons8-chapéu-de-formatura-48.png" type="image/x-icon">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <title>Editar</title>
    <style>
        #menu{
            background-color: black;
            width: 100%;
        }
        .sumir{
            display:none;
        }
        #menu_lateral{
            width: 80px;
            background-color: black;
            z-index:1000;
            position: fixed;
            height: 100%;
        }
        .titulo{
            font-size: 25px;
            margin-top: 100px;
        }
        .row{
            margin-left:100px;
        }
        #cabecalho{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
<?php 
 session_start();
 if($_SESSION['ATIVA'] == TRUE){
     $cpf = $_SESSION['CPF'];
     $nome = $_SESSION['NOME'];
     $rg = $_SESSION['RG'];
     $email = $_SESSION['EMAIL'];
     $endereco = $_SESSION['ENDERECO'];
     $celular = $_SESSION['CELULAR'];
     $senha = $_SESSION['SENHA'];
     $curso = $_SESSION['CURSO'];
     $privilegio = $_SESSION['PRIVILEGIO'];
     
 }else {
     header("location:../index.php");
 }

?>

     <!-- menu -->
     <nav class="navbar fixed-top navbar-light" id="menu">
        <a class="navbar-brand" href="#">
            <div class="row">
                <img src="../assets/icons8-chapéu-de-formatura-48.png">
                <h3 style="color: white; margin-top:6px;">Repositorio de TCC</h3>
            </div>
        </a>
         <!--- botão de opções de usuario -->
         <div class="dropdown" id="drop">
            <a class="btn btn-secondary dropdown-toggle" href="#" id="nome" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../assets/icons8-menu-de-usuário-masculino-40.png" style="width: 20px;">
            </a>
            <div class="dropdown-menu" id="aparece" aria-labelledby="dropdownMenuLink" style="margin-left: -120px;">
                <a class="dropdown-item" href="#"><?php echo $_SESSION['NOME']; ?></a>
                <a class="dropdown-item" href="#"></a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
        </div>
    </nav>
    <div style="width: 800px; position: relative; margin: 0 auto; margin-top: 0px;">
    <h2 class="titulo">Editar</h2>

        <form action="edicaoAdm.php" method="POST">
            <div class="form-row">
                <div class="form-group col-8">
                    <label>Nome</label>
                    <input type="text" class="form-control"  name="nome" value="<?php echo $nome ?>">
                </div>
                <div class="form-group col-4">
                    <label>CPF</label>
                    <input type="text" class="form-control" name="cpf" value="<?php echo $cpf ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label>RG</label>
                    <input type="text" class="form-control" name="rg" value="<?php echo $rg ?>">
                </div>
                <div class="form-group col-4">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" value="<?php echo $senha ?>">
                </div>
                <div class="form-group col-4">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label>Celular</label>
                    <input type="text" class="form-control" name="celular" value="<?php echo $celular ?>">
                </div>
                <div class="form-group col-4">
                    <label>Endereço</label>
                    <input type="text" class="form-control" name="endereco" value="<?php echo $endereco ?>">
                </div>
                <div class="form-group col-4">
                    <label>Privilegio</label>
                    <select name="privilegio" class="form-control" id="pri">
                        <option value="0">Administrador comun</option>
                        <option value="1">Coordenador</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <label id="labelCurso">Curso</label>
                <input type="text" class="form-control" id="curso" readonly="true" value="<?php echo $_SESSION['CURSO']; ?>">
            </div>
            <br>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Desativar conta
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" id="cabecalho">
        <h5 class="modal-title" id="exampleModalLabel">Deseja realmente continuar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Ao deletar sua conta você perderá total acesso ao sistema por tempo indeterminado. 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="desativarAdm.php"><button type="button" class="btn btn-danger">Sim, tenho certeza!</button></a>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function(){
        var privilegio = <?=json_encode($privilegio)?>;
        document.getElementById('pri').value = privilegio;

        var curso = <?=json_encode($curso) ?>;
        if(curso){
            $('#curso').css('display', 'block');
            $('#labelCurso').css('display', 'block');
        }else{
            $('#curso').css('display', 'none');
            $('#labelCurso').css('display', 'none');

        }
    });
</script>
</body>
</html>