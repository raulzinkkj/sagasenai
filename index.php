<?php
include 'conexao/conexao.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuario(nome_usuario, senha_usuario) VALUES (:nome_usuario, :senha_usuario)";

    $stmt= $conexao->prepare($sql);
    $stmt->bindParam(':nome_usuario',$nome);
    $stmt->bindParam(':senha_usuario',$senha);
    $stmt->execute();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="">

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>