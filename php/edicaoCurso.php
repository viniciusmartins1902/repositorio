<?php
    include_once 'conexao.php';
    session_start();
    $curso = $_POST['curso'];
    $adm = $_POST['adm'];
    $id = $_SESSION['ID'];

    $sql = "UPDATE TURMA SET NOME = '$curso', ADM = '$adm' WHERE ID = $id";
    $consulta = mysqli_query($envio, $sql);
    if($consulta){
        header('location:cordenador.php?result=1');
    }else{
        header('location:cordenador.php?result=2');

    }
?>