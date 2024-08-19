<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/CategoriaDAO.php';

    // Objeto Global!
    $objDAO = new CategoriaDAO();

    // Identificação dos dados do ID que foi passado do Consultar para o Alterar/Excluir!
    if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
        $idCategoria = $_GET['cod'];

        $dados = $objDAO->DetalharCategoria($idCategoria);

        // echo'<pre>';
        // print_r($dados);
        // echo'</pre>';

        if (count($dados) == 0) {
            header('location: consulta_categoria.php');
            exit;
        }
    } else if (isset($_POST['btnGravar'])) {
        $idCategoria = $_POST['cod'];
        $nomeCategoria = $_POST['nomecategoria'];

        $ret = $objDAO->AlterarCategoria($nomeCategoria, $idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
        exit;
    } else if (isset($_POST['btnExcluir'])) {
        $idCategoria = $_POST['cod'];
        $ret = $objDAO->ExcluirCategoria($idCategoria);

        header('location: consultar_categoria.php?ret=' . $ret);
    } else {
        header('location: consultar_categoria.php');
        exit;
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
                        <h2> Alterar categoria </h2>
                        <h5> Aqui você poderá alterar ou excluir suas categoria </h5>
                    </div>
                </div>
                <hr />
                <form action="alterar_categoria.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_categoria'] ?>">
                    <div class="form-group">
                        <label> Nome da categoria </label>
                        <input class="form-control" placeholder="Digite o nome da categoria..." name="nomecategoria" id="nomecategoria" value="<?= $dados[0]['nome_categoria'] ?>">
                    </div>
                    <button type="submit" name="btnGravar" class="btn btn-success" onclick="return ValidarCategoria()" name="btnGravar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a categoria: <b> <?= $dados[0]['nome_categoria'] ?> ?</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="btnExcluir"> Confirmar exclusão </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</boby>
</html>