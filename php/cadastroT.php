<?php 
    include_once 'conexao.php';

    $curso = $_POST['curso'];
    $adm = $_POST['adm'];
    $sql = "INSERT INTO TURMA (NOME, ADM) VALUES('$curso', '$adm')";
    if($curso != null){
        $con = mysqli_query($envio, $sql);

        if($con){
            header('location:adm.php?resultado=1');
        }else{
            header('location:adm.php?resultado=2');
        }
    }else{
        header('location:adm.php?resultado=2');
    }
?>