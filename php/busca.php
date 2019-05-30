<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <?php 
        include_once 'conexao.php';
        header('Content-Type: text/html; charset=utf-8');
    ?>
    <title>Document</title>
    <style>
        .minha{
            margin: 0 auto;
            width: 800px;
            font-size: 20px;
        }
     .cabeca{
            border-bottom: solid 1px;
            border-color: blue;
        }
        .minha .corpoT:hover{
            background-color:#ddd6ff;
        }
        .icon{
            width: 20px;
            height: 20px;  
        }
    </style>
</head>
<body>
<table class="minha">
    <thead class="cabeca">
            <td>Matricula</td>
            <td>Nome</td>
            <td>Sexo</td>
            <td>Data Nascimento</td>
            <td>Curso</td>
            <td>TCC</td>
    </thead>
<?php
    $dado = $_POST['dado'];
    $filtro = $_POST['filtro'];
    switch($filtro){
        case 1:
            $sql = "SELECT
                    ALUNO.NOME, ALUNO.MATRICULA, ALUNO.SEXO, ALUNO.NASC, ALUNO.ANO, ALUNO.TCC, ALUNO.VISIVEL, TURMA.NOME as CURSO
                    FROM ALUNO
                    INNER JOIN TURMA 
                    ON ALUNO.TURMA = TURMA.ID
                    WHERE ALUNO.NOME LIKE '%$dado%'";
        break;
        case 2:
            $sql = "SELECT
                    ALUNO.NOME, ALUNO.MATRICULA, ALUNO.SEXO, ALUNO.NASC, ALUNO.ANO, ALUNO.TCC, ALUNO.VISIVEL, TURMA.NOME as CURSO
                    FROM ALUNO
                    INNER JOIN TURMA 
                    ON ALUNO.TURMA = TURMA.ID
                    WHERE ALUNO.MATRICULA LIKE '%$dado%'";        
        break;
        case 3:
            $sql = "SELECT
                    ALUNO.NOME, ALUNO.MATRICULA, ALUNO.SEXO, ALUNO.NASC, ALUNO.ANO, ALUNO.TCC, ALUNO.VISIVEL, TURMA.NOME as CURSO
                    FROM ALUNO
                    INNER JOIN TURMA 
                    ON ALUNO.TURMA = TURMA.ID
                    WHERE ALUNO.ANO LIKE '%$dado%'";        
        break;
        default:
            $sql = "SELECT
                    ALUNO.NOME, ALUNO.MATRICULA, ALUNO.SEXO, ALUNO.NASC, ALUNO.ANO, ALUNO.TCC, ALUNO.VISIVEL, TURMA.NOME as CURSO
                    FROM ALUNO
                    INNER JOIN TURMA 
                    ON ALUNO.TURMA = TURMA.ID";
        break;
    }
    $pesquisa = mysqli_query($envio, $sql);

    if($pesquisa){
        while($row = mysqli_fetch_array($pesquisa)){
            if($row['VISIVEL'] == 0 && $row['TCC'] != null){
            ?>
                <tbody class="corpoT">
                    <td id="matricula">
                        <?php 
                            echo $row['MATRICULA'];
                            $variavel = $row['MATRICULA']; 
                            json_decode($variavel);
                        ?>
                    </td>
                    <td><?php echo $row['NOME']; ?></td>
                    <td><?php echo $row['SEXO']; ?></td>
                    <td><?php echo $row['NASC']; ?></td>
                    <td><?php echo $row['CURSO']; ?></td>
                    <td><a href="http://localhost/repositorio/php/upload/<?php echo $row['TCC']; ?>"><img src="../assets/icons8-pdf-20.png" style="widht: 30px; height: 30px;"></a></td>
                    <td>
                        <a href="confirm.php?matricula=<?php echo $row['MATRICULA'] ?>">
                            <button class="btn btn-success">
                                <img class="icon" src="../assets/icons8-gosto-disso-50.png">
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="delete.php?matricula=<?php echo $row['MATRICULA'] ?>">
                            <button class="btn btn-danger">
                                <img class="icon" src="../assets/icons8-polegares-para-baixo-20.png">    
                            </button>
                        </a>
                    </td>
                </tbody>
            <?php
            }
        }
    }
?>

</table>
</body>
</html>    