<?php
    require_once '../modelo/Banco.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario = $_POST['usuario'];
        $senha = md5($_POST['senha']);
        $banco = new Banco();
        $usuarios = $banco->listarUsuarios();
        foreach ($usuarios as $user){
            if($user['username'] == $usuario and
            $user['password']==$senha){
                session_start();
                $_SESSION['usuario'] = $user['username'];
                header('Location: principal.php');
            }
        }
        $msg = 'Usuário e/ou Senha Inválidos.';
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="../vendor/bootstrap-5.3.0-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../vendor/fontawesome-free-6.4.2-web/css/all.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="w-25 shadow p-3 mx-auto">
        <p class="text-center">
            <img src="../imagens/chave.png" class="w-50">
        </p>
        <h3 class="text-center mb-4">Acesso ao Sistema</h3>

        <?php if(isset($msg)):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção!</strong> <?php echo $msg;?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>
        <form method="post" action="login.php" class="mt-1">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">USUÁRIO</label>
                <input name="usuario" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">SENHA</label>
                <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <input type="submit" value="Entrar" class="btn btn-success w-100">
        </form>
    </div>
<script src="../vendor/bootstrap-5.3.0-dist/js/bootstrap.bundle.js"></script>
</body>
</html>