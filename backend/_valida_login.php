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
        // inicia a sessão

        session_start();
        
        $_SESSION['login'] = $usuario;

        var_dump($_SESSION['email']);

        header('location: ../admin/gerenciar-viagens.php');
    }else{
        header('location: ../admin/index.html');
        echo "usuario ou senha invalido";
    }


}catch(PDOException $erro){
    echo $erro ->getMessage();

}