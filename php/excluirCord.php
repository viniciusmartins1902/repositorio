<?php 
    include_once 'conexao.php';

    $cpf = $_GET['cpf'];
    $sql = "UPDATE ADM SET ATIVA = 0 WHERE CPF = '$cpf'";

    $acesso = mysqli_query($envio, $sql);
    if($acesso){
        header('location:cordenador.php?result=1');
    }else{
        header('location:cordenador.php?result=2');
    }
?>