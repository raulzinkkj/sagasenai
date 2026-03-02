<?php
$local = 'localhost';
$banco = 'nomedobanco';
$usuario = 'root';
$senha ='';

try{
    $conexao = new PDO("mysql:host=$local;dbname=$banco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conectou";
}catch(PDOException $e){
    echo "Não deu certo!" . $e->getMessage();
}