<?php


    include_once "../classes/quadrado.class.php";
    require_once "../conf/Conexao.php";
    include_once "../conf/dafault.inc.php";
    
    $acao = "";
    if(isset($_POST['acao'])){$acao = $_POST['acao'];}else if(isset($_GET['acao'])){$acao = $_GET['acao'];}
    if ($acao == "excluir"){
        $id = isset($_GET['id']) ? $_GET['id'] : 0;

        $Quadrado = new Quadrado("","","");
        $resultado = $Quadrado->excluir($id);
        header("location:../listar.php");
    }
   
    $acao = isset($_POST['acao']) ? $_POST['acao'] : "";
    if ($acao == "salvar"){
        $id = isset($_POST['id']) ? $_POST['id'] : "";

        if ($id == 0){
            $Quadrado = new Quadrado("", $_POST['lado'], $_POST['cor'] );     
            $resultado = $Quadrado->salvar();
            header("location:../listar.php");
        }else {
            $quad = new Quadrado($_POST['id'], $_POST['lado'], $_POST['cor']);
            $resultado = $quad->editar();
        }  
        header("location:../listar.php");  

    }     


    //Consultar dados
    function buscarDados($lado){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM quadrado WHERE id = $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['lado'] = $linha['lado'];
            $dados['cor'] = $linha['cor'];
            
        }
        return $dados;
    }

?>