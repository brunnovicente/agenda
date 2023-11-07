<?php

    require_once 'barra.php';


    if(isset($_GET['id'])){
        require_once '../modelo/Banco.php';
        $banco = new Banco();
        $banco->excluirPessoa($_GET['id']);
        header('Location: principal.php');
    }else{
        echo "<script>alert('Erro ao tentar excluir!')</script>";
        echo "<script>window.location = 'principal.php'</script>";
    }