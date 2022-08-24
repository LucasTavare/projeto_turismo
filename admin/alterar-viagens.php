<?php
include '../backend/conexao.php';

$id = $_GET['id'];

try {

    $sql = "SELECT * FROM tb_viagens WHERE id = $id;";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    //     var_dump($dados);
    // echo '</pre>';

} catch (PDOException $erro) {
    echo $erro->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Viagens</title>
    <link rel="stylesheet" href="../css/style-cadastrar.css">
</head>

<body>
    <div id="container">
        <h3>Alterar Viagens</h3>

        <a class="mudar-pagina" href="../admin/gerenciar-viagens.php">
            <- Gerenciar Viagens</a>
                <div id="formulario">
                    <form action="../backend/_alterar_viagens.php" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="id">ID</label>
                            <input type="text" name="id" id="id" value="<?php echo $dados[0]['id'] ?>" readonly>
                        </div>
                        <div>
                            <label for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
                        </div>
                        <div>
                            <label for="local">local</label>
                            <input type="text" name="local" id="local" value="<?php echo $dados[0]['local'] ?>">
                        </div>
                        <div>
                            <label for="valor">Valor</label>
                            <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor'] ?>">
                        </div>
                        <div class="img-troca">
                            <img class="imagens-alterar" src="../img/upload/<?php echo $dados[0]['imagem']?>" alt="imagem da viagem">
                        </div>
                        <div >
                            <label for="imagem">Imagem</label>
                            <input type="file" name="imagem" id="imagem">
                        </div>
                        <div>
                            <label for="desc">Descrição</label>
                            <textarea id="textarea" name="desc" id="desc" cols="30" rows="10"><?php echo $dados[0]['desc'] ?></textarea>
                        </div>
                </div>
                <div>
                    <input class="button" type="submit" value="Salvar">
                </div>
                </form>
    </div>


</body>

</html>