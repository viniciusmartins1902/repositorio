<?php
    include_once 'conexao.php';
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];
    $celular = $_POST['celular'];
    $rg = $_POST['rg']; 
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    
    $sql = "INSERT INTO ADM VALUES('$cpf', '$nome', '$senha', $tipo, '$email', '$endereco', '$rg', '$celular', 1)";
    $post = mysqli_query($envio, $sql);

    if($post){
        header('location:cordenador.php?result=1');
    }else{
        header('location:cordenador.php?result=2');
    }
?>