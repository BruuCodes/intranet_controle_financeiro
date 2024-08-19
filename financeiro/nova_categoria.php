<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/CategoriaDAO.php';

    if (isset($_POST['btnGravar'])) {
        $nome = $_POST['nome'];

        $objdao = new CategoriaDAO();
        $ret = $objdao->CadastrarCategoria($nome);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>

<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2> Nova categoria </h2>
                        <h5> Aqui você poderá cadastrar todas as suas categoria </h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="nova_categoria.php">
                    <div class="form-group">
                        <label> Nome da categoria </label>
                        <input class="form-control" name="nome" placeholder="Digite o nome da categoria"  name="categoria" id="categoria" value="<?=isset($categoria) ? $categoria : ''?>"/>
                    </div>
                    <button type="submit" name="btnGravar" class="btn btn-success" onclick="return ValidarCategoria()"> Salvar </button>
                </form>
            </div>
        </div>
    </div>
</boby>
</html>