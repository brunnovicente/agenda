<?php
    require_once '../modelo/Banco.php';
    $banco = new Banco();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $banco->editarPessoa($id, $nome, $email);
        echo "<script>alert('Pessoa editada com sucesso!')</script>";
        echo "<script>window.location = 'principal.php';</script>";
    }else{
        $pessoa = $banco->pegarPessoa($_GET['id']);
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
        <p class="text-end mt-2">
            <a href="/app/principal.php" class="btn btn-sm btn-outline-dark"><i class="fas fa-chevron-circle-left"></i> Voltar</a>
        </p>
        <form method="post" action="editar.php">
            <label>ID</label>
            <input class="form-control w-25" type="text" hidden="hidden" name="id" value = "<?php echo $pessoa['id'];?>">
            <label class="form-label">NOME</label>
            <input class="form-control" type="text" name="nome" value="<?php echo $pessoa['nome']; ?>">
            <label class="form-label">E-MAIL</label>
            <input class="form-control" type="text" name="email" value="<?php echo $pessoa['email']; ?>">
            <input class="mt-2 btn btn-success" type="submit" value="Salvar">
        </form>
    </div>

    <script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
</body>
</html>