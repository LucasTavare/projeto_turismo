<?php

include '../backend/conexao.php';
// conexão com o banco de dados

try{
    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    exit;

    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];

    $pasta = '../img/upload/';

    $imagem = 'imagem.jpg';

    //função q faz o upload da img

    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);


    $sql = "INSERT INTO tb_viagens(`titulo`,`local`,`valor`,`desc`)VALUES('$titulo','$local','$valor','$desc')";

    $comando = $con ->prepare($sql);

    $comando->execute();

    header('Location: ../admin/gerenciar-viagens.php');

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>