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
    <link rel="stylesheet" href="../css/style-atualizar.css">
</head>

<body>
    <div id="container">
        <h3>Alterar Viagens</h3>

        <form action="../backend/_alterar_viagens.php" method="post">
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $dados[0]['id'] ?>" readonly>
            </div>
            <div class="inputs">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'] ?>">
            </div>
            <div class="inputs">
                <label for="local">local</label>
                <input type="text" name="local" id="local" value="<?php echo $dados[0]['local'] ?>">
            </div>
            <div class="inputs">
                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor'] ?>">
            </div>
            <div class="inputs">
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $dados[0]['desc'] ?></textarea>
            </div>
            <div class="inputs">
                <input class="btn" type="submit" value="Salvar">
            </div>
        </form>
    </div>


</body>

</html>