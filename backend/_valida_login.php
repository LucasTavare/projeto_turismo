<?php
include ('../backend/conexao.php');

try{
    $usuario = $_POST['login'];

    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE email = '$usuario' AND BINARY senha = '$senha';";

    $comando = $con->prepare($sql);

    $comando -> execute();

    $dados = $comando->fetchALL(PDO::FETCH_ASSOC);

    // var_dump($dados);

    // verifica se existem registros dentro da variavel dados

    if($dados != null){


        header('location: ../admin/gerenciar-viagens.php');
    }else{
        header('location: ../admin/index.html');
        echo "usuario ou senha invalido";
    }


}catch(PDOException $erro){
    echo $erro ->getMessage();

}