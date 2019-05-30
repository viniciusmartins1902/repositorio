<?php 
    include_once 'conexao.php';

    session_start();
    $cpf = $_GET['cpf'];
    $adm = $_GET['adm'];
    $curso = $_GET['curso'];
    $id = $_GET['id'];
    $sql = "UPDATE ADM SET ATIVA = 0 WHERE CPF = '$cpf'";

    $consulta = mysqli_query($envio, $sql);
  
    if($consulta){
        header("location:editarCurso.php?cpf=$cpf&&adm=$adm&&curso=$curso&&id=$id&&result=1");
    }else{
        header('location:cordenador.php?result=2');    
    }
?>