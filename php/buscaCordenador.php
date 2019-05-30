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
    $cpf = $_SESSION['CPF'];

    $sql1 = "SELECT * FROM ADM WHERE PRIVILEGIO = 1 && ATIVA = 1";

    $acesso = mysqli_query($envio, $sql1);
    if($acesso){
        while($linha = mysqli_fetch_array($acesso)){
            ?>
            <tbody class="corpoT">
                <td><?php echo $linha['CPF'] ?></td>
                <td><?php echo $linha['NOME'] ?></td>
                <td><?php echo $linha['EMAIL'] ?></td>
                <td><?php echo $linha['ENDERECO'] ?></td>
                <td><?php echo $linha['RG'] ?></td>
                <td><?php echo $linha['CELULAR'] ?></td>
            </tbody>
            <?php
        }
    }
?>    
</table>
</body>
</html>
