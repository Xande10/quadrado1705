<?php

require_once "classes/quadrado.class.php";
require_once "conf/Conexao.php";


$title = "Listar";
$cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
$lado = isset($_POST["lado"]) ? $_POST["lado"] : "";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php $title ?></title>

    <script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

</head>
<body>
    </fieldset>
    <hr>
    <div>
        <table>
            <thead>
                <tr>
                    <th scope="col"> | #ID | </th>
                    <th scope="col"> | Lado | </th>
                    <th scope="col"> | Cor | </th>
                    <th scope="col"> | Mostrar | </th>
                    <th scope="col"> | Excluir | </th>
                    <th scope="col"> | Editar | </th>
                </tr>
            </thead>
            <tbody>
            <?php
                $pdo = Conexao::getInstance();
                $consulta = $pdo->query("SELECT * FROM quadrado ORDER BY id");
                while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $linha['id'];?></th>
                    <th scope="row"><?php echo $linha['lado'];?></th>
                    <th scope="row"><?php echo $linha['cor'];?></th>
                    <th scope="row"><a href="mostrar.php?lado=<?php echo $linha["lado"];?>&cor=<?php echo str_replace('#', '%23', $linha['cor']);?>">Mostrar quadrado</a></th>
                    <th scope="row"><?php echo " <a href=javascript:excluirRegistro('acao/acao.php?acao=excluir&id={$linha['id']}')>Excluir</a><br>"; ?></th>
                    <td><a href='listar.php?acao=editar&id=<?php echo $linha['id'];?>'>Editar</a></td>
                </tr>
            <?php } ?> 
            </tbody>
        </table>
    </div>
    <hr>
    <a href="formulario.php">Voltar ao cadastro</a>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>