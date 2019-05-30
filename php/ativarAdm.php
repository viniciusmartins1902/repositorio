<?php 
    include_once 'conexao.php';
    $cpf = $_GET['cpf'];
    $sql = "UPDATE ADM SET ATIVA = 1 WHERE CPF = '$cpf'";
    $consulta = mysqli_query($envio, $sql);
    if($consulta){
        header('location:cordenador.php?result=1');
    }else{
        header('location:cordenador.php?result=2');
    }
?>