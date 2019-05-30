<?php 
        $matricula = $_POST['matricula'];
        include_once 'conexao.php';
        $extencao = strtolower(substr($_FILES['tcc']['name'], -4));
        $novo_nome = md5(time()) . $extencao;
        $diretorio = "upload/";
    
        if($extencao == '.pdf'){
            move_uploaded_file($_FILES['tcc']['tmp_name'], $diretorio . $novo_nome);
            $sql = "UPDATE ALUNO SET VISIVEL = 0, TCC = ('$novo_nome') WHERE MATRICULA = $matricula";
            $cadastro = mysqli_query($envio, $sql);
            if($cadastro){
                header('location:postar.php?resultado=1');
            }else{
                header('location:postar.php?resultado=2');
            }
        }else{
            header('location:postar.php?resultado=2');
        }
?>