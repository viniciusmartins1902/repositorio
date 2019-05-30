<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .minha{
            margin: 0 auto;
            width: 800px;
            font-size: 16px;
        }
        .minha .cabeca{
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
        #aparecer{
            width: 200px;
            height: 100px;
            background-color: yellow;
            position: absolute;
            display:none;
        }
        .editar img{
            margin-left: 10px;
        }
        
    </style>
</head>
<body>
<table class="minha">
    <thead class="cabeca">
        <td>Matricula</td>
        <td>Nome</td>
        <td>Sexo</td>
        <td>Ano</td>
        <td>Nascimento</td>
        <td>Curso</td>
        <td>Tcc</td>
        <td>Editar</td>
        <td>Excluir</td>
    </thead>
<?php 
    include_once 'conexao.php';
    $ano = date('Y');
    $id = $_SESSION['ID'];
    $sql = "SELECT 
            ALUNO.MATRICULA, ALUNO.NOME, ALUNO.VISIVEL, ALUNO.SEXO, ALUNO.ANO, ALUNO.NASC, TURMA.ID, TURMA.NOME AS CURSO, ALUNO.TCC
            FROM ALUNO
            INNER JOIN TURMA
            INNER JOIN ADM
            ON ALUNO.TURMA = TURMA.ID
            WHERE ADM.CPF = TURMA.ADM AND ALUNO.ANO = '$ano' AND TURMA.ID = $id
            ORDER BY ALUNO.NOME ASC";
    $pesquisa = mysqli_query($envio, $sql);
    if($pesquisa){
        while($row = mysqli_fetch_array($pesquisa)){
            ?>
                <tbody class="corpoT">
                    <td><?php echo $row['MATRICULA']; ?></td>
                    <td><?php echo $row['NOME']; ?></td>
                    <td><?php echo $row['SEXO']; ?></td>
                    <td><?php echo $row['ANO']; ?></td>
                    <td><?php echo $row['NASC']; ?></td>
                    <td><?php echo $row['CURSO']; ?></td>
                    <?php 
                        $status = $row['TCC'];
                        $pendencia = $row['VISIVEL'];
                        if($status == null or $pendencia == null){
                            ?>
                            <td><img src="../assets/icons8-pdf-20(2).png" style="widht: 30px; height: 30px;"></td>
                            <?php
                        }else if($status == null or $pendencia == 0){
                            ?>
                                <td><img src="../assets/icons8-pdf-20(3).png" style="widht: 30px; height: 30px;" id="pendente"></td>
                            <?php                            
                        }else{
                            ?>
                            <td><a href="http://localhost/repositorio/php/upload/<?php echo $row['TCC']; ?>"><img src="../assets/icons8-pdf-20 (1).png" style="widht: 30px; height: 30px;"></a></td>
                            <?php
                        }
                    ?>
                    <td class="editar"><a href="editar.php?nome=<?php echo $row['NOME'] ?> && matricula=<?php echo $row['MATRICULA'] ?> && nasc=<?php echo $row['NASC'] ?>&&ano=<?php echo $row['ANO'] ?>&&sexo=<?php echo $row['SEXO'] ?>&&curso=<?php echo $row['CURSO'] ?>"><img src="../assets/icons8-editar-arquivo-20.png" style="widht: 25px; height: 25px;"></a></td>
                    <td><a href="excluir.php?matricula=<?php echo $row['MATRICULA'] ?>"><img src="../assets/icons8-lixo-20.png" style="widht: 25px; height: 25px;"></a></td>
                </tbody>
            <?php     
        }
    }
?>
</table>    
</body>
</html>