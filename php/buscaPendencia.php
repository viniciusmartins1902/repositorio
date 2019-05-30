<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .table{
            margin: 0 auto;
            width: 800px;
            text-align: center;
            font-size: 15px;
            background-color: #f0edff;
        }
        .table .cima{
            border-bottom: solid 1px;
            border-color: blue;
        }
        .table .meio:hover{
            background-color:#ddd6ff;
        }
    </style>
</head>
<body>
<table class="table">
    <thead class="cima">
            <td>Matricula</td>
            <td>Nome</td>
            <td>Sexo</td>
            <td>Data Nascimento</td>
            <td>Curso</td>
            <td>TCC</td>
    </thead>
    <?php 
        include_once 'conexao.php';
        $turma = $_SESSION['TURMA'];
        $sql = "SELECT 
                ALUNO.MATRICULA, ALUNO.NOME, ALUNO.SEXO, ALUNO.ANO, ALUNO.NASC, TURMA.NOME AS CURSO, ALUNO.TCC
                FROM ALUNO
                INNER JOIN TURMA
                INNER JOIN ADM
                ON ALUNO.TURMA = TURMA.ID
                WHERE ALUNO.TCC = '' AND ADM.CPF = TURMA.ADM
                ORDER BY ASC";
        $consulta = mysqli_query($envio, $sql);

        if($consulta){
            while($row = mysqli_fetch_array($consulta)){
                ?>
               <tbody class="meio">
                    <td><?php echo $row['MATRICULA'];?></td>
                    <td><?php echo $row['NOME']; ?></td>
                    <td><?php echo $row['SEXO']; ?></td>
                    <td><?php echo $row['NASC']; ?></td>
                    <td><?php echo $row['CURSO']; ?></td>
                    <td>Pendente</td>
                <?php
            }
            
        }else{
            echo 'Não há alunos com pendencia';
        }
    ?>
</table>
</body>
</html>