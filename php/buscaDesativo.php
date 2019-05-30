<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="minha">
    <thead class="cabeca">
        <td>CPF</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Endereço</td>
        <td>RG</td>
        <td>Celular</td>
    </thead>
<?php
    include_once 'conexao.php';

    $sql2 = "SELECT * FROM ADM WHERE ATIVA = 0";

    $acesso2 = mysqli_query($envio, $sql2);
    if($acesso2){
        while($linha2 = mysqli_fetch_array($acesso2)){
            ?>
            <tbody class="corpoT">
                <td><?php echo $linha2['CPF'] ?></td>
                <td><?php echo $linha2['NOME'] ?></td>
                <td><?php echo $linha2['EMAIL'] ?></td>
                <td><?php echo $linha2['ENDERECO'] ?></td>
                <td><?php echo $linha2['RG'] ?></td>
                <td><?php echo $linha2['CELULAR'] ?></td>
                <td> <a href="ativarAdm.php?cpf=<?php echo $linha2['CPF']; ?>"><input type="submit" class="btn btn-success" value="Reativar"></a></td>
            <?php
        }
    }else{
        ?>  
        <td>Não há adiministradores desativados</td>
        <?php 
    }
?>   
        </tbody>
</table>
</body>
</html>
