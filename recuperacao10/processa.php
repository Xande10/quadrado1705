<?php



include_once "classes/quadrado.class.php";
$title = "Processa";
$cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
$lado = isset($_POST["lado"]) ? $_POST["lado"] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title; ?></title>

</head>
<body>
    <?php
        $quad = new Quadrado($id, $lado, $cor);

        $quad->salvar();
        header("location:formulario.php");
    ?>
    <br>
    <div class="class"></div>

</body>
</html>