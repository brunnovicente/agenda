<?php

require_once '../modelo/Banco.php';

$banco = new Banco();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $b = $_POST['busca'];
    $pessoas = $banco->listarPessoas($b);
}else {
    $pessoas = $banco->listarPessoas("");
}
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

        <p class="text-end"><a href="cadastrar.php" class="btn btn-sm btn-outline-success m-2"><i class="fa-solid fa-user-plus"></i> Cadastrar</a></p>
        <!-- CONTEÚDO -->

        <div class="my-2 col-md-6">
            <form method="post" action="principal.php">
                <input class="form-control" type="text" name="busca" placeholder="Digite para buscar">
            </form>
        </div>

        <table class="table table-striped">
            <tr>
                <th>NOME</th>
                <th>E-MAIl</th>
                <th></th>
            </tr>
            <?php foreach ($pessoas as $pessoa):?>
            <tr>
                <td><?php echo $pessoa['nome'];?></td>
                <td><?php echo $pessoa['email'];?></td>
                <td class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Contatos</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a class="dropdown-item" href="editar.php?id=<?php echo $pessoa['id'] ?>">Editar</a></li>
                            <li><button class="dropdown-item" onclick="excluir(<?php echo $pessoa['id'] ?>)">Excluir</button></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </table>

    </div>

    <script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
    <script>
        function excluir(id){
            var resposta = confirm("Tem certeza que deseja excluir?");
            if(resposta){
                window.location = 'excluir.php?id='+id;
            }
        }
    </script>
</body>
</html>