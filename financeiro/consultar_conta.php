<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/ContaDAO.php';

    $objDAO = new ContaDAO();
    $contas = $objDAO->ConsultarConta();

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
                        <h2> Consultar conta bancária </h2>
                        <h5> Consulte todas suas contas bancárias aqui </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Contas cadastrada. Caso deseja alterar, clique no botão
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Banco</th>
                                                <th>Agência</th>
                                                <th>Número da conta</th>
                                                <th>Saldo</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($contas as $ct){ ?>
                                                <tr class="odd gradeX">
                                                    <td><?= $ct['banco_conta'] ?></td>
                                                    <td><?= $ct['agencia_conta'] ?></td>
                                                    <td><?= $ct['numero_conta'] ?></td>
                                                    <td>R$ <?= number_format($ct['saldo_conta'], 2, ',', '.') ?></td>
                                                    <td><a href="alterar_conta.php?cod=<?= $ct['id_conta'] ?>" class="btn btn-warning btn-xs">Alterar</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>