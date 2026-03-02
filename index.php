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
    //comentario

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .cabecalho {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 330px;
        }
        .cel_cabecalho {
            border: solid 1px black;
            width: 110px;
            margin: 1px;
            padding: 0 2px 0 2px;
        }
    </style>
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
    <div class="resultado">
        <?php
        $sql = "SELECT * FROM usuario";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0){

        echo "<div class='cabecalho'>";
            echo "<div class='cel_cabecalho'>ID</div>";
            echo "<div class='cel_cabecalho'>nome</div>";
            echo "<div class='cel_cabecalho'>senha</div>";
            echo "<div class='cel_cabecalho'>ações</div>";
        echo "</div>";
        
        while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='cabecalho'>";
                echo "<div class='cel_cabecalho'>{$linha['id_usuario']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['nome_usuario']}</div>";
                echo "<div class='cel_cabecalho'>{$linha['senha_usuario']}</div>";

                //Formulário para deletar
                echo "<div class='cel_cabecalho'>";

                echo "<form action='api/deletar_usuario.php' method='post' onsubmit=\"return confirm('Deseja realmente deletar este usuario?');\">";
                echo "<input type='hidden' name='id' value='{$linha['id_usuario']}'>";
                echo "<button type='submit'>Deletar</button>";
                echo "</form>";
            echo "</div>";

            echo "</div>";

        }
        }
        ?>
    </div>
</body>
</html>