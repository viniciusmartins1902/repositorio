<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php 
    include_once 'conexao.php';

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $privilegio = $_POST['privilegio'];
    session_start();
    $cpfInicial = $_SESSION['CHAVE'];
    
    $sql3 = "UPDATE ADM SET CPF = '$cpf', NOME ='$nome', SENHA = '$senha', PRIVILEGIO = $privilegio, EMAIL = '$email', ENDERECO = '$endereco', RG = '$rg', CELULAR = '$celular' WHERE CPF = $cpfInicial;";
    $post = mysqli_query($envio, $sql3);
    if($post){
        header('location:cordenador.php?result=1');
    }else{
        header('location:cordenador.php?result=2');
    }
?>
</body>
</html>

