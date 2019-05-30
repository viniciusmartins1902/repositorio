<?php 
    $turma = ['turma'];
    $nome = $_POST['nome'];
    $extencao = ".pdf";
    $novo_nome = md5(time()) .'(' . $nome .')'. $extencao;
    
    switch($turma){
        case 1:
            $diretorio = ''
    }

    $envio =  move_uploaded_file($_FILES['tcc']['tmp_name'],$diretorio . $novo_nome);
    if($envio){
        header('location:../index.php');
    }
?>
