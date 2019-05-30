<?php
    $server = "localhost";
    $user = "root";
    $senha = "";
    $banco = "repo";
    
    $envio = mysqli_connect($server, $user, $senha, $banco);
    mysqli_set_charset($envio, "utf8");
?>