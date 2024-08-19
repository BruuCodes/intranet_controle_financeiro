<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/MovimentoDAO.php';

    $objDAO = new MovimentoDAO();

    $totalEntrada = $objDAO->TotalEntrada();
    $totalSaida = $objDAO-> TotalSaida();
    $movs = $objDAO ->MostrarUltimosLancamento();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
    include_once '_head.php';
?>
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
                        <h2> Sistema de controle </h2>
                        <h5> Seja Bem vindo(a) <strong><?= UtilDAO::NomeLogado(); ?></strong>, este é seu intranet de controle financeiro. </h5>
                    </div>
                </div>

                <hr>

                <div class="col-md-6">
                    <div class="panel panel-primary text-center no boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$<?=$totalEntrada[0]['Total'] != '' ? number_format($totalEntrada[0]['Total'],2, ',', '.') : '0' ?></h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            <span>Total de Entrada</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                         <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3>R$<?=$totalSaida[0]['Total'] != '' ? number_format($totalSaida[0]['Total'],2, ',','.') : '0' ?></h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            <span>Total de Saida. </span>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Resultado encontrado
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th> ID </th>
                                            <th> Data </th>
                                            <th>Tipo</th>
                                            <th>Categoria</th>
                                            <th>Empresa</th>
                                            <th>Conta</th>
                                            <th>Valor</th>
                                            <th>Observação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $total = 0;

                                            for ($i=0; $i < count($movs); $i++) {
                                                if ($movs[$i]['tipo_movimento'] == 1) {
                                                    $total = $total + $movs[$i]['valor_movimento'];
                                                } else {
                                                    $total = $total - $movs[$i]['valor_movimento'];
                                                }

                                        ?>
                                            <tr class="odd gradeX">
                                                <td><?= $i+1 ?></td>
                                                <td><?= $movs[$i]['data_movimento'] ?></td>
                                                <td><?= $movs[$i]['tipo_movimento'] == 1 ? '<strong style="color: #006400;">Entrada</strong>' : '<strong style="color: #ff0000;">Saída</strong>' ?></td>
                                                <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                <td><?= $movs[$i]['banco_conta'] ?> / Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm. <?= $movs[$i]['numero_conta'] ?></td>
                                                <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                <td><?= $movs[$i]['obs_movimento'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <center>
                                    <label style="color: <?= $total < 0 ? '#ff0000' : '#006400' ?>"> TOTAL: R$ <?= number_format($total, 2, ',', '.'); ?></label>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>