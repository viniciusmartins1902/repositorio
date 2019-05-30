<?php 
    include_once 'conexao.php';
    session_start();

    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $ano = $_POST['ano'];
    $nasc = $_POST['nasc'];
    $sexo = $_POST['sexo'];
    $curso = $_SESSION['CURSO'];
            
        $sql = "INSERT INTO ALUNO (MATRICULA, NOME, SEXO, NASC, ANO, TURMA) VALUES($matricula, '$nome', '$sexo', '$nasc', $ano, $curso)";
        $query = mysqli_query($envio, $sql);
        if($query){
            header("location:adm.php?resultado=1");
        }else{
            header("location:adm.php?resultado=2");
        }
?>