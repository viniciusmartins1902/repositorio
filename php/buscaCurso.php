<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .tabela{
            width: 600px;
            text-align: center;
            margin-left: 50px;
            margin-top: 0px;
        }
        .tabela .cabecalho{
            border-bottom: solid 1px;
            border-color: blue;
        }
        .tabela .corpo tr:hover{
            background-color:#ddd6ff;
        }
        .cursos{
            font-size: 23px;
            margin-top: 30px;
            margin-left: 50px;
        }
    </style>
</head>
<body>
<table class="tabela">
        <h2 class="cursos">Cursos cadastrados</h2>
        <thead class="cabecalho">
            <td>Id</td>
            <td>Curso</td>
            <td>Adiministrador</td>
        </thead>
<?php 
    include_once 'conexao.php';
    $sql = "SELECT 
    ADM.CPF, ADM.NOME, TURMA.NOME AS CURSO, TURMA.ADM, TURMA.ID 
    FROM ADM
    INNER JOIN TURMA 
    ON ADM.CPF = TURMA.ADM";
    
    $consulta = mysqli_query($envio, $sql);

    if($consulta){
        while($row = mysqli_fetch_array($consulta)){
            ?>
                <tbody class="corpo">
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['CURSO']; ?></td>
                        <td><?php echo $row['NOME'];?></td>
                        <td><a href="editarCurso.php?id=<?php echo $row['ID']; $_SESSION['ID'] = $row['ID']; ?>&&curso=<?php echo $row['CURSO']; ?>&&adm=<?php echo $row['NOME']; ?>&&cpf=<?php echo $row['CPF']; ?>">Editar</a></td>
                    </tr>
                </tbody>
            <?php
        }
    }

?>
</table>
</body>
</html>
