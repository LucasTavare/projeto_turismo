<?php

include '../backend/conexao.php';
// conexão com o banco de dados

try{
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO tb_viagens (titulo,local,valor,desc)VALUES('$titulo','$local','$valor','$desc')"

}catch(PDOException $erro){

}

?>