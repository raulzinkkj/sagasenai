<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_usuario = $_POST['id'];

    if(!empty($id_usuario)){
        $sql = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id_usuario);
        
        if($stmt->execute()){
            echo "produto deletado.";
        }else{
            echo "não deu pra excluir.";
        }
    }else{
        echo "Erro de ID";
    }
}
?>

