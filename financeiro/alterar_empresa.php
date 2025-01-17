<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/EmpresaDAO.php';

    $objDAO = new EmpresaDAO();

    if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
        $idEmpresa = $_GET['cod'];
        $dados = $objDAO->DetalharEmpresa($idEmpresa);

        if (count($dados) == 0) {
            header('location: consultar_empresa.php');
            exit;
        }
    } else if (isset($_POST['btnGravar'])) {
        $idEmpresa = $_POST['cod'];
        $nomeEmpresa = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        $ret = $objDAO->AlterarEmpresa($nomeEmpresa, $telefone, $endereco, $idEmpresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    } else if (isset($_POST['btnExcluir'])) {
        $idEmpresa = $_POST['cod'];

        $ret = $objDAO->ExcluirEmpresa($idEmpresa);

        header('location: consultar_empresa.php?ret=' . $ret);
        exit;
    } else {
        header('location: consultar_empresa.php');
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
                        <h2> Alterar Empresa </h2>
                        <h5> Aqui você poderá alterar as suas empresas </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form method="Post" action="alterar_empresa.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label> Nome da empresa</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa..." name="nome" id="nomeEmpresa" value="<?= $dados[0]['nome_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> Telefone </label>
                        <input class="form-control" placeholder="Digite o telefone da Empresa (Opcional)" name="telefone" id="telefone" value="<?= $dados[0]['telefone_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da Empresa (Opcional)" name="endereco" id="endereco" value="<?= $dados[0]['endereco_empresa'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()"> Salvar </button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a Empresa:</span> 
                                    <br>
                                    <span>Nome da Empresa: <b><?= $dados[0]['nome_empresa'] ?> ?</b></span>
                                    <br>
                                    <span>Telefone: <b><?= $dados[0]['telefone_empresa'] ?> ?</b></span>
                                    <br>
                                    <span>Endereço: <b><?= $dados[0]['endereco_empresa'] ?> ?</b></span>
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