<?php 

include '../backend/conexao.php';

try{

    $sql = "SELECT * FROM tb_viagens";

    $comando = $con -> prepare($sql);

    $comando -> execute();

    $dados = $comando -> fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($dados);
    // echo "</pre>";

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style-cadastrar.css">

</head>
<body>
    <div id="container">
        <h3>Gerenciar Viagens</h3>


        <a class="mudar-pagina" href="cadastrar_viagens.html"><- Cadastrar  Viagens</a>


        <div id="tabela">
            <table class="tabela-viagens">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Local</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php
                    foreach($dados as $d):
                ?>
                <tr>
                    <td><?php echo $d['id']?></td>
                    <td><?php echo $d['titulo']?></td>
                    <td><?php echo $d['local']?></td>
                    <td><?php echo $d['valor']?></td>
                    <td><?php echo $d['desc']?></td>
                    <td>
                        <a href="../admin/alterar-viagens.php?id=<?php echo $d['id']?>">
                            Alterar
                        </a>
                    </td>
                    <td>
                        <a href="../backend/deletar-viagens.php?id=<?php echo $d['id']?>">
                            Deletar
                        </a>
                    </td>
                </tr>

                <?php
                    endforeach;
                ?>

            </table>
        </div>
    </div>
</body>
</html>