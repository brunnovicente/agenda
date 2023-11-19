<?php
    require_once '../modelo/Banco.php';
    $banco = new Banco();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $telefone = $_POST['telefone'];
        $id = $_POST['id'];

        $banco->cadastrarContato($telefone, $id);
        echo "<script>alert('Contato cadastrado com sucesso!')</script>";
        echo "<script>window.location = 'contatos.php?id=".$id."';</script>";
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
        <div class="col-md-5 mx-auto">
            <h4>Cadastrar contato para <span class="text-primary"><?php echo $pessoa['nome'];?></span></h4>
            <form method="post" action="cadastrarcontato.php">
                <input hidden="hidden" name="id" value="<?php echo $pessoa['id'];?>">
                <label class="form-label">TELEFONE</label>
                <input class="form-control" type="text" name="telefone">
                <input class="mt-2 btn btn-success" type="submit" value="Salvar">
            </form>
        </div>
    </div>

    <script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
</body>
</html>