<?php 
    include_once 'conexao.php';
    session_start();
    $cpf = $_SESSION['CPF'];
    $sql = "UPDATE ADM SET ATIVA = 0 WHERE CPF = '$cpf'";
    $consulta = mysqli_query($envio, $sql);
    if($consulta){
        header('location:../index.php');
    }else{
        header('location:editarAdm.php');
    }
?>