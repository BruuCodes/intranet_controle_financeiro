<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/MovimentoDAO.php';

    $dtInicio = '';
    $dtFinal = '';
    $tipoMov = '';

    if (isset($_POST['btnSalvar'])) {
        $tipoMov = $_POST['tipoMov'];
        $dtInicio = $_POST['dtInicio'];
        $dtFinal = $_POST['dtFinal'];

        $objDAO = new MovimentoDAO();

        // Esta variavel Array $movs, recebe toda a consulta feita pelo FETCH_ASSOC, que foi jogada na variavel $sql da Classe!
        $movs = $objDAO->ConsultarMovimento($tipoMov, $dtInicio, $dtFinal);

        // echo'<pre>';
        // print_r($movs);
        // echo'</pre>';

    } else if (isset($_POST['btnExcluir'])) {
        $idMov = $_POST['idMov'];
        $idConta = $_POST['idConta'];
        $tipo = $_POST['tipo'];
        $valor = $_POST['valor'];

        $objDAO = new MovimentoDAO();
        $ret = $objDAO->ExcluirMovimento($idMov, $idConta, $tipo, $valor);
    }
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
                        <h2> Consultar movimento </h2>
                        <h5> Consulte todos os movimentos em um determinado periodo</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="consultar_movimento.php" method="POST">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label> Tipo de movimento </label>
                            <select class="form-control" name="tipoMov">
                                <option value="">Selecione</option>
                                <option value="0" <?= $tipoMov == 0 ? 'selectd' : '' ?>>Todos</option>
                                <option value="1" <?= $tipoMov == 1 ? 'selectd' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipoMov == 2 ? 'selectd' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Data inicial </label>
                            <input type="date" class="form-control" name="dtInicio" id="dtInicio"  value="<?= isset($dtInicio) ? $dtInicio : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Data final </label>
                            <input type="date" class="form-control" name="dtFinal" id="dtFinal" value="<?= isset($dtFinal) ? $dtFinal : '' ?>">
                        </div>
                    </div>
                    <center>
                        <button class="btn btn-info" name="btnSalvar" onclick="ValidarConsultarMovimento()">Pesquisar
                        </button>
                    </center>
                </form>

                <hr>

                <?php if (isset($movs)) { ?>
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
                                                <th>Ação</th>
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
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir<?= $i ?>" >Excluir </a>
                                                        <form action="consultar_movimento.php" method="POST">
                                                            <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento'] ?>">
                                                            <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                            <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                            <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento'] ?>">

                                                            <div class="modal fade" id="modalExcluir<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                            <h4 class="modal-title" id="myModalLabel">confirmação de exclusão</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <center> 
                                                                                <b>Deseja excluir o movimento: </b>
                                                                            </center> 
                                                                            <br> 
                                                                            <b> Data do movimento:</b> <?= $movs[$i]['data_movimento'] ?>
                                                                            <br>
                                                                            <b> Tipo do movimento:</b> <?= $movs[$i]['data_movimento'] == 1 ? 'Entrada' : 'Saida' ?>
                                                                            <br>
                                                                            <b> Categoria:</b> <?= $movs[$i]['nome_categoria'] ?> 
                                                                            <br>
                                                                            <b> Empresa:</b> <?= $movs[$i]['nome_empresa'] ?> 
                                                                            <br>
                                                                            <b> Conta:</b> <?= $movs[$i]['banco_conta'] ?> / Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm. <?= $movs[$i]['numero_conta'] ?> 
                                                                            <br>
                                                                            <b> Valor:</b> R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" class="btn btn-primary" name="btnExcluir"> Confirmar exclusão </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
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
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>