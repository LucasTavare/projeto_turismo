<?php

try{
    // dados da conexao com o banco
    define('SERVIDOR','localhost');
    define('USUARIO','root');
    define('SENHA','');
    define('BASEDADOS','db_turismo');

    $conn = new PDO("mysql:host=".SERVIDOR.";dbname=".BASEDADOS, USUARIO, SENHA);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão foi bem sucedida!";

}catch(PDOException $e){
    echo "Erro ao conectar: ".$e->getMessage();
}