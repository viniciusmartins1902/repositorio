<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="shortcut icon" href="../assets/icons8-chapéu-de-formatura-48.png" type="image/x-icon">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <title>Pagina de adiministrador</title>
    <style>
        .botao{
            display: block;
        }
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
        .icone{
            display: block;
            width: 30px;
            line-height: 80px;
        }
        .tab-pane{
            position: relative;
            margin-left: 300px;
        }
        @media(max-width: 800px){
            .tab-pane{
                margin-left: 100px;
            }
        }
        .turma{
            position: relative;
            margin-top: 100px;
            left: 50px;
        }
        @media(max-width: 650px){
           .turma{
               margin-left: 0px;
           }
        }
        @media(max-width: 450px){
            .turma{
                margin-left: -100px;
            }
        }
        .aluno{
            margin-top: 100px;
            font-size: 25px;
        }
        .imagem{
            width: 200px;
            height: 100px;

        }
        .titulo{
            font-size: 25px;
        }
        .cabecalho-erro{
            background-color:red;
            color: white;
        }
        .cabecalho-sucesso{
            background-color:green;
            color: white;
        }
        .cabecalho-info{
            background-color:blue;
            color: white;
        }
        #aviso{
            display:none;
            width:100%;
        }
        #nome{
            font-size: 10px;
        }
        #listar{
            background-color:gray;
            width: 100%;
            height: 150px;
            border-bottom: solid 2px;
            font-size: 25px;
            line-height: 100px;
        }
        .nome{          
            margin-left:20px;
        }
        .legenda{
            margin-top: 0px;
        }
    </style>
</head>
<body id="corpo">
<div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
</div>
    <?php
        session_start();
        if($_SESSION['ATIVA'] == TRUE){
            $cpf = $_SESSION['CPF'];
           
        }else {
            header("location:../index.php");
        }
    ?>  
    <!-- menu -->
     <nav class="navbar fixed-top navbar-light" id="menu">
        <img src="../assets/icons8-menu-40.png" class="botao">
        <a class="navbar-brand" href="#">
            <div class="row">
                <img src="../assets/icons8-chapéu-de-formatura-48.png">
                <h3 style="color: white; margin-left:10px; margin-top:6px;">Repositorio de TCC</h3>
            </div>
        </a>
         <!--- botão de opções de usuario -->
         <div class="dropdown" id="drop">
            <a class="btn btn-secondary dropdown-toggle" href="#" id="nome" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="../assets/icons8-menu-de-usuário-masculino-40.png" style="width: 20px;">
            </a>
            <div class="dropdown-menu" id="aparece" aria-labelledby="dropdownMenuLink" style="margin-left: -120px;">
                <a class="dropdown-item" href="editarAdm.php"><?php echo $_SESSION['NOME']; ?></a>
                <a class="dropdown-item" href="#"></a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
        </div>
    </nav>     
<!-- menu lateral --> 
<div class="row">
    <div class="col-2 sm-col-4 xs-col-12" id="menu_lateral">
        <br>
        <br>
        <br>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><label class="sumir">Pagina Inicial</label> <img src="../assets/icons8-house-40.png" class="icone"></a>
        <a class="nav-link" id="v-pills-aluno-tab" data-toggle="pill" href="#v-pills-aluno" role="tab" aria-controls="v-pills-aluno" aria-selected="false"><label class="sumir">Confirmação de aluno</label><img src="../assets/icons8-avaliador-feminino-40.png" class="icone"></a>
        <a class="nav-link" id="v-pills-cadastro-tab" data-toggle="pill" href="#v-pills-cadastro" role="tab" aria-controls="v-pills-cadastro" aria-selected="false"><label class="sumir">Cadastro de aluno</label><img src="../assets/icons8-inscrição-de-estudante-40.png" class="icone"></a>
        <a class="nav-link" id="v-pills-turma-tab" data-toggle="pill" href="#v-pills-turma" role="tab" aria-controls="v-pills-turma" aria-selected="false"><label class="sumir">Cadastro de turma</label><img src="../assets/icons8-adicionar-grupo-de-usuários-homem-homem-40.png" class="icone"></a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><label class="sumir">Alunos com pendencia</label><img src="../assets/icons8-grupos-de-usuários-40.png" class="icone"></a>

        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
           <br>
            <div class="jumbotron" style=" background-color:#fff; margin-top:50px;"> 
                <h1 class="display-4">Bem vindo!</h1>
                <p class="lead">Seja bem vindo senhor(a) <?php echo $_SESSION['NOME'];  ?>, esta é a sua pagina de adiministrador, aqui você terá total acesso as funcionalidades de sistema</p>
                <hr class="my-4">
            </div>
        </div>
        <div class="tab-pane fade" id="v-pills-aluno" role="tabpanel" aria-labelledby="v-pills-aluno-tab">
           <div class="form-row col-12" style="margin-top: 100px;">
                <h3>Confirme as postagens</h3>
                <input type="text" class="form-control col-10" id="campo" placeholder="Busque por...">
                <select name="filtro" id="filtro" class="form-control col-2">
                    <option value="null">Selecione</option>
                    <option value="1">Nome</option>
                    <option value="2">Matricula</option>
                    <option value="3">Ano</option>
                    <option value="4">Curso</option>
                </select>
           </div>
           <br>
           <div id="dados">
                <img src="../assets/carrega.gif" style="display:none;" class="carrega">
           </div>
        </div>
        <div class="tab-pane fade" id="v-pills-turma" class="turma" role="tabpanel" aria-labelledby="v-pills-turma-tab">
            <h2  class="aluno">Alunos Cadastrados</h2>

            <div style="background-color: white; width: 490px;">
                <img src="../assets/icons8-pdf-20(2).png" style="widht: 30px; height: 30px;">
                <label>Pendencia</label>
                <img src="../assets/icons8-pdf-20(3).png" style="widht: 30px; height: 30px;">
                <label>Aguardando aprovação</label>
                <img src="../assets/icons8-pdf-20 (1).png" style="widht: 30px; height: 30px;">
                <label>Aprovado</label>
            </div>
            <?php 
                include_once 'buscaAluno.php';
            ?>

        </div>
        <div class="tab-pane fade" id="v-pills-cadastro" role="tabpanel" aria-labelledby="v-pills-cadastro-tab">
            <form action="cadastroA.php" method="POST" class="turma">
            <h2 class="titulo">Cadastro de aluno:</h2>

                <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Nome completo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite o nome do aluno">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Matricula</label>
                            <input type="text" class="form-control" name="matricula" id="matricula" placeholder="Digite a mmatricula do aluno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Ano</label>
                            <input type="text" class="form-control" name="ano" id="ano" placeholder="Ano de saída">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Data de nascimento</label>
                            <input type="date" class="form-control" name="nasc" placeholder="Data de nascimmento">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Sexo</label>
                            <select class="form-control" name="sexo">
                                <option>Selecione</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                    <label>Curso</label>
                                <?php 
                                    require_once 'conexao.php';
                                    $sql = "SELECT * FROM TURMA WHERE ADM = $cpf";
                                    $consulta = mysqli_query($envio, $sql);
                                        while($row = mysqli_fetch_assoc($consulta)){
                                            $_SESSION['CURSO'] = $row['ID'];
                                ?>
                                    <input type="text" class="form-control" name="curso" value="<?php echo $row['NOME']; ?>" disabled>
                                <?php
                                        }

                                ?>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="cadastrar">    
            </form>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
            <h2 class="aluno">
                Alunos que ainda não enviaram seus TCC's
            </h2>
            <?php 
                include_once 'buscaPendencia.php';
            ?>   
        </div>
    </div>
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
                Sucesso!
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
                Erro!
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
    let menu = 1;
    $(document).ready(function(){
        let tam = $(window).width();
        $('.botao').click(function(){
            if(menu == 1){
                $('.col-2').css("width", "80px");
                $('.sumir').css("display", "none");
                $('.icone').css("display", "block");
                menu = 0;
            }else{
                if(tam > 600){
                    $('.col-2').css("width", "300px");    
                    $('.sumir').css("display", "block");
                    $('.icone').css("display", "none");
                }else{
                    $('.icone').css("display", "block");
                    $('.sumir').css("display", "none");

                }
                menu = 1;
            }
        });
        $('#tcc').change(function(){
            var valor = $('#tcc').val();
            var str = valor.substr(length-4);
            if(str != '.pdf'){
                $('#tcc').css('borderColor', 'red');
                $('#aviso').show('slow');
            }else{
                $('#tcc').css('borderColor', 'green');
                $('#aviso').hide('slow');

            }
        });
        
        $('#carrega').click(function(){
            console.log("chamou");
            window.location.href = 'http://localhost/repositorio/php/adm.php';
        });
        $('#funciona').click(function(){
            console.log("chamou");
            window.location.href = 'http://localhost/repositorio/php/adm.php';
        });
        $('#teste').click(function(){
            console.log("chamou");
            window.location.href = 'http://localhost/repositorio/php/adm.php';
        });
       $('#matricula').mask('0#');
       $('#ano').mask('0#');

    $(window).scroll(function(){
        var scroll = $(window).strcollTop();
        if(scroll >= 100){
            $("#menu_lateral").css("marginTop", "-100px");
        }
    });
    $("#campo").on('keyup', function(){
     var dado = $(this).val();
     var filtro = $("#filtro").val();
        $.ajax({
            url: 'busca.php',
            type: 'POST',
            beforeSend: function(){
                $('#carrega').css('display', 'block');
            },
            data: {dado: dado, filtro: filtro},
            success: function(msg){
                $("#dados").html(msg);
            }
        });
    });
    $.ajax({
        url: 'buscaCurso.php',
        type: 'POST',
        success: function(dado){
            $("#pesquisa").htnl(dado);
        }
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