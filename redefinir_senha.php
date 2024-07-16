<?php
include_once './config/config.php';
include_once './classes/Usuario.php';


$mensagem = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    $nova_senha = $_POST['nova_senha'];
    $usuario = new Usuario($db);


    if ($usuario->redefinirSenha($codigo, $nova_senha)) {
        $mensagem = 'Senha redefinida com sucesso. Você pode <a href="index.php">entrar</a> agora.';
    } else {
        $mensagem = 'Código de verificação inválido.';
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./redefinir_senha.css">
    <title>Redefinir Senha</title>
</head>

<body>
    <h1>Redefinir Senha</h1>

    <div class="container">
        <form method="POST">
            <label for="codigo">Código de Verificação:</label>
            <input class="campText" type="text" name="codigo" placeholder="Seu código aqui!" required><br><br>
            <label for="nova_senha">Nova Senha:</label>
            <input class="campText" type="password" name="nova_senha" required><br><br>
            <input class="botao" type="submit" value="Redefinir Senha">    
        </form>
    </div>
    <p><?php echo $mensagem; ?></p>
</body>

</html>