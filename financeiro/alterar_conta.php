<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/ContaDAO.php';

    $objDAO = new ContaDAO();

    if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
        $idConta = $_GET['cod'];

        $dados = $objDAO->DetalharConta($idConta);

        if(count($dados) == 0){
            header('location: consultar_conta.php');
            exit;
        }
    }else if (isset($_POST['btnSalvar'])) {
        $idConta = $_POST['cod'];
        $banco = trim($_POST['banco']);
        $agencia = trim($_POST['agencia']);
        $numero = trim($_POST['numero']);
        $saldo = trim($_POST['saldo']);

        $ret = $objDAO->AlterarConta($banco, $agencia, $numero, $saldo, $idConta);

        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    }else if(isset($_POST['btnExcluir'])){
        $idConta = $_POST['cod'];

        $ret = $objDAO->ExcluirConta( $idConta);

        header('location: consultar_conta.php?ret=' . $ret);
        exit;
    }else{
        header('location: consultar_conta.php');
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
                        <h2> Alterar ou excluir conta bancária </h2>
                        <h5> Aqui você poderá alterar todas as suas contas </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form action="alterar_conta.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                    <div class="form-group">
                        <label> Nome do banco</label>
                        <input class="form-control" placeholder="Digite o nome da banco..." name="banco" id="banco" value="<?= $dados[0]['banco_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> Agência </label>
                        <input class="form-control" placeholder="Digite a agência" name="agencia" id="agencia" value="<?= $dados[0]['agencia_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> Numero da conta</label>
                        <input class="form-control" placeholder="Digite o número da conta" name="numero" id="numero" value="<?= $dados[0]['numero_conta'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> Saldo </label>
                        <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo" value="<?= $dados[0]['saldo_conta'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return ValidarConta()"> Salvar </button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger">Excluir</button>

                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    <span>Deseja excluir a Conta:</span> 
                                    <br>
                                    <span>Nome do Banco: <b><?= $dados[0]['banco_conta'] ?> ?</b></span>
                                    <br>
                                    <span>Agência: <b><?= $dados[0]['agencia_conta'] ?> ?</b></span>
                                    <br>
                                    <span>Numero da Conta: <b><?= $dados[0]['numero_conta'] ?> ?</b></span>
                                    <br>
                                    <span>Saldo: <b>R$ <?= number_format($dados[0]['saldo_conta'], 2, ',', '.') ?> ?</b></span>
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