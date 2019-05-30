<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
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
    </style>
</head>
<body>
<?php 
 session_start();
 if($_SESSION['ATIVA'] == TRUE){
     $cpf = $_SESSION['CPF'];
     $nome = $_GET['nome'];
     $matricula = $_GET['matricula'];
     $ano = $_GET['ano'];
     $curso = $_GET['curso'];
     $nasc = $_GET['nasc'];
     $sexo = $_GET['sexo'];
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

        <form action="edicao.php" method="POST">
            <div class="form-row">
                <div class="form-group col-8">
                    <label>Nome</label>
                    <input type="text" class="form-control"  name="nome" value="<?php echo $nome ?>">
                </div>
                <div class="form-group col-4">
                    <label>Matricula</label>
                    <input type="text" class="form-control" readonly="readonly" name="matricula" value="<?php echo $matricula ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label>Ano</label>
                    <input type="text" class="form-control" name="ano" value="<?php echo $ano ?>">
                </div>
                <div class="form-group col-4">
                    <label>Data de nascimento</label>
                    <input type="date" class="form-control" name="nasc" value="<?php echo $nasc ?>">
                </div>
                <div class="form-group col-4">
                    <label>Sexo</label>
                    <input type="text" class="form-control" name="sexo" value="<?php if($sexo == 'M'){
                        echo "Masculino";
                    }else{
                        echo "Feminino";
                    }
                    ?>">
                </div>
            </div>
            <div class="form-row">
                <label>Curso</label>
                <input type="text" class="form-control" disabled="true" value="<?php echo $curso ?>">
            </div>
            <br>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Atualizar">
                </div>
            </div>
        </form>
    </div>
</body>
</html>