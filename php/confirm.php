<?php 
    include_once 'conexao.php';
    $matricula = $_GET['matricula'];
    $valor = true;
    $sql = "UPDATE ALUNO SET VISIVEL = $valor WHERE MATRICULA = $matricula";
    
    $envio = mysqli_query($envio, $sql);
    if($envio){
        header('location:adm.php');
    }else{
        return "Erro ao enviar!";
    }
?>