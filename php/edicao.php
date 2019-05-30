<?php 
    include_once 'conexao.php';
    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $ano = $_POST['ano'];
    $sexo = $_POST['sexo'];
    $nasc = $_POST['nasc'];
    if(($sexo == "masculino") || ($sexo == "Masculino")){
        $sexoTestado = "M";
    }else{
        $sexoTestado = "F";
    }

    $sql = "UPDATE ALUNO SET NOME = '$nome', SEXO = '$sexoTestado', NASC = '$nasc' WHERE MATRICULA = $matricula";
    $cad = mysqli_query($envio, $sql);
    if($cad){
        header('location:adm.php?resultado=1');
    }else{
        header('location:adm.php?resultado=2');

    }
    
?>