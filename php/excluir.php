<?php 
    include_once 'conexao.php';
    $matricula = $_GET['matricula'];

    $sql = "DELETE FROM ALUNO WHERE MATRICULA = $matricula";
    $cad = mysqli_query($envio, $sql);
    if($cad){
        header('location:adm.php?resultado=1');
    }else{
        header('location:adm.php?resultado=2');
    }
?>