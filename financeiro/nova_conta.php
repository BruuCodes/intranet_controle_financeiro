<?php 

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/ContaDAO.php';

    if(isset($_POST['btnSalvar'])){
        $banco = trim($_POST['banco']);
        $agencia = trim($_POST['agencia']);
        $numero = trim($_POST['numero']);
        $saldo = trim($_POST['saldo']);


        $objDAO = new ContaDAO();
        $ret = $objDAO->CadastrarConta($banco, $agencia, $numero, $saldo);
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
                        <h2> Nova Conta </h2>
                        <h5> Aqui você poderá cadastrar todas as suas contas </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>

                <hr />

                <form action="nova_conta.php" method="POST">
                    <div class="form-group">
                        <label> Nome do banco</label>
                        <input class="form-control" placeholder="Digite o nome da banco..." name="banco" id="banco" value="<?= isset($banco) ? $banco : '' ?>" />
                    </div>

                    <div class="form-group">
                        <label> Agência </label>
                        <input class="form-control" placeholder="Digite a agência" name="agencia" id="agencia" value="<?= isset($agencia) ? $agencia : '' ?>" />
                    </div>

                    <div class="form-group">
                        <label> Numero da conta</label>
                        <input class="form-control" placeholder="Digite o número da conta" name="numero" id="numero" value="<?= isset($numero) ? $numero : '' ?>" />
                    </div>

                    <div class="form-group">
                        <label> Saldo </label>
                        <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo" value="<?= isset($saldo) ? $saldo : '' ?>" />
                    </div>

                    <button type="submit" class="btn btn-success" name="btnSalvar" onclick=" return  ValidarConta()"> Salvar </button>
                </form>
            </div>
        </div>
    </div>
</boby>
</html>