<?php
    require_once '../modelo/Banco.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $banco = new Banco();
        $banco->cadastrarPessoa($nome, $email);
        echo "<script>alert('Pessoa cadastrada com sucesso!')</script>";
        echo "<script>window.location = 'principal.php';</script>";
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar</title>
    <link href="../vendor/bootstrap-5.3.0-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../vendor/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container p-3 shadow mx-auto">
        <!-- MENU -->
        <?php include('barra.php')?>

        <form method="post" action="cadastrar.php">
            <label class="form-label">NOME</label>
            <input class="form-control" type="text" name="nome">
            <label class="form-label">E-MAIL</label>
            <input class="form-control" type="text" name="email">
            <input class="mt-2 btn btn-success" type="submit" value="Salvar">
        </form>
    </div>

    <script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
</body>
</html>