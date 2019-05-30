<?php 
    include_once 'conexao.php';
    $matricula = $_GET['matricula'];

    $sql = "UPDATE ALUNO SET TCC = NULL WHERE MATRICULA = $matricula";

    $consulta = mysqli_query($envio, $sql);
    if($consulta){
        header('location:adm.php');
    }else{
        echo "erro";
    }
?>