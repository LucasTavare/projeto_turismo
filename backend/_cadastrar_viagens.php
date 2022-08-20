<?php

include '../backend/conexao.php';
// conexão com o banco de dados

try{
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";

    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];


    //descobrir a extensão da imagem
    //formatos validos: jpg/png/jpeg

    // ======================================================================================================================= //

    // Upload de Imagem

    $nome_original_imagem = $_FILES['imagem']['name'];

    $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);

    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        echo 'Formato de Imagem inválido';
        exit;
    }

    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));

    $nome_final_imagem = $hash.'.'.$extensao;

    $pasta = '../img/upload/';
    

    //função q faz o upload da img

    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    
    // ======================================================================================================================= //

    $sql = "INSERT INTO tb_viagens(`titulo`,`local`,`valor`,`desc`,`imagem`)VALUES('$titulo','$local','$valor','$desc', '$nome_final_imagem')";

    $comando = $con ->prepare($sql);

    $comando->execute();

    header('Location: ../admin/gerenciar-viagens.php');

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>