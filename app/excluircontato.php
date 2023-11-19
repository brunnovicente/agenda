<?php

require_once 'barra.php';
require_once '../modelo/Banco.php';

if(isset($_GET['id'])){
    $banco = new Banco();
    $banco->excluirContato($_GET['id']);
    echo "<script>alert('Contato removido com sucesso!')</script>";
    echo "<script>window.location = 'contatos.php?id=".$_GET['pessoa']."'</script>";
}else{
    header('Location: principal.php');
}