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
        .cabecalho-sucesso{
            background-color:#ffe316;
            color: white;
        }
    </style>
</head>
<body>
<?php 
    $curso = $_GET['curso'];
    $id = $_GET['id'];
    $nome = $_GET['adm'];
    $cpf = $_GET['cpf'];
    $_SESSION['ID'] = $id; 
    $retorn = $_GET['result'];
    if($retorn != 0){
        if($retorn == 1){
            echo "<script> $(document).ready(function(){ $('#login-modal').modal('show'); }); </script>";        
        }
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
    <form action="edicaoCurso.php" method="POST">
            <div class="form-row">
                <div class="form-group col-8">
                    <label>Curso</label>
                    <input type="text" class="form-control"  name="curso" value="<?php echo $curso; ?>">
                </div>
                <div class="form-group col-4">
                    <label>Adm</label>
                    <select name="adm" class="form-control" id="adm">
                    <?php 
                        include_once 'conexao.php';
                        $sql = "SELECT ADM.NOME, ADM.CPF FROM ADM WHERE PRIVILEGIO = 0 && ATIVA = 1";
                        $consulta = mysqli_query($envio, $sql);

                        if($consulta){
                            while($row = mysqli_fetch_array($consulta)){
                                ?>  
                                <option value="<?php echo $row['CPF']; ?>" ><?php echo $row['NOME'] ?></option>
                                <?php
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <input type="submit" class="btn btn-primary" value="Atualizar">
            </div>
    </form>
    <!-- janela modal de sucesso -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <div class="modal-content">
       <div class="modal-header cabecalho-sucesso">
         <h5 class="modal-title" id="fonte">Atenção!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="funcao()"> 
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="alert alert" role="alert">
                O adiministrador <?php echo $nome ?> estava vinculado ao curso de <?php echo $curso ?> e foi desativado, por isso é nescessário que o senhor(a) escolha um novo adimistrador para o curso!
            </div>        
        </div>
        <div class="modal-footer">
            <button type="button" id="carrega" class="btn btn-warning" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter">Entendi!</button>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function(){
        var cpf = <?=json_encode($cpf)?>;
        document.getElementById('adm').value = cpf;

    });
</script>
</body>
</html>