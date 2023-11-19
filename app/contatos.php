<?php

require_once '../modelo/Banco.php';

$banco = new Banco();

$pessoa = $banco->pegarPessoa($_GET['id']);
$contatos = $banco->pegarContatos($pessoa['id']);


?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link href="../vendor/bootstrap-5.3.0-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../vendor/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- DIV DO CONTEÚDO -->
<div class="container p-3 shadow mx-auto">

    <!-- MENU -->
    <?php include('barra.php')?>

    <p class="text-end">
        <a href="cadastrarcontato.php?id=<?php echo $pessoa['id'];?>" class="btn btn-sm btn-outline-success m-2"><i class="fas fa-phone"></i> Novo</a>
        <a href="/app/principal.php" class="btn btn-sm btn-outline-dark"><i class="fas fa-chevron-circle-left"></i> Voltar</a>
    </p>
    <!-- CONTEÚDO -->
    <div>
        <h4 class="text-center"><?php echo $pessoa['nome']?></h4>
        <p class="text-center mb-4"><?php echo $pessoa['email']?></p>
    </div>
    <div class="col-md-5 mx-auto">
        <table class="table table-striped">
            <tr>
                <th>TELEFONE</th>
                <td></td>
            </tr>
            <?php foreach ($contatos as $contato):?>
            <tr>
                <td class=""><?php echo $contato['telefone'];?></td>
                <td class="d-flex justify-content-end">
                    <button onclick="excluir(<?php echo $contato['id'];?>, <?php echo $pessoa['id'];?>)" class="btn text-danger"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>

<script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
<script>
    function excluir(id, pessoa){
        var resposta = confirm("Tem certeza que deseja excluir o telefone?");
        if(resposta){
            window.location = 'excluircontato.php?id='+id+'&pessoa='+pessoa;
        }
    }
</script>
</body>
</html>