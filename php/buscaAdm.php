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
            width: 900px;
            font-size: 16px;
        }
        .minha .cabeca{
            border-bottom: solid 1px;
            border-color: blue;
        }
        .minha .corpoT:hover{
            background-color:#ddd6ff;
        }
 
        #aparecer{
            width: 200px;
            height: 100px;
            background-color: yellow;
            position: absolute;
            display:none;
        }
    </style>
</head>
<body>
<table class="minha">
    <thead class="cabeca">
        <td>CPF</td>
        <td>Nome</td>
        <td>RG</td>
        <td>Email</td>
        <td>Endereço</td>
        <td>Celular</td>
        <td>Curso</td>
    </thead>
    <?php 
        include_once 'conexao.php';
        
        $sql = "SELECT 
        ADM.CPF, ADM.NOME, ADM.ATIVA, ADM.RG, ADM.EMAIL, ADM.PRIVILEGIO, ADM.SENHA, ADM.ENDERECO, ADM.CELULAR, TURMA.ID, TURMA.NOME AS CURSO, TURMA.ADM
        FROM ADM
        INNER JOIN TURMA 
        ON ADM.CPF = TURMA.ADM
        WHERE ADM.ATIVA = 1";

        $consulta = mysqli_query($envio, $sql);
        if($consulta){
            while($row = mysqli_fetch_array($consulta)){
                ?>
                <tbody class="corpoT">
                    <td><?php echo $row['CPF'] ?></td>
                    <td><?php echo $row['NOME'] ?></td>
                    <td><?php echo $row['RG'] ?></td>
                    <td><?php echo $row['EMAIL'] ?></td>
                    <td><?php echo $row['ENDERECO'] ?></td>
                    <td><?php echo $row['CELULAR'] ?></td>
                    <td><?php echo $row['CURSO'] ?></td>
                    <td><a href="excluirAdm.php?cpf=<?php echo $row['CPF']; ?>&& curso=<?php echo $row['CURSO']; ?>&& adm=<?php echo $row['NOME']; ?>&& id=<?php echo $row['ID']; ?>"><input type="submti" class="btn btn-danger" value="Desativar" style="width:100px;"></a></td>
                </tbody>
                <?php
            }
        }
    ?>
</table>
</body>
</html>

