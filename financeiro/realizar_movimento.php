<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/MovimentoDAO.php';
    require_once '../DAO/CategoriaDAO.php';
    require_once '../DAO/EmpresaDAO.php';
    require_once '../DAO/ContaDAO.php';

    $dao_cat = new CategoriaDAO();
    $dao_emp = new EmpresaDAO();
    $dao_con = new ContaDAO();

    if(isset($_POST['btnGravar'])){
        $tipo = $_POST['tipo'];
        $data = trim($_POST['data']);
        $valor = trim($_POST['valor']);
        $obs = trim($_POST['obs']);
        $categoria = $_POST['categoria'];
        $empresa = $_POST['empresa'];
        $conta = $_POST['conta'];

        $objDAO = new MovimentoDAO();
        $ret = $objDAO->RealizarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta);
    }

    $categoria = $dao_cat->ConsultarCategoria();
    $empresa = $dao_emp->ConsultarEmpresa();
    $conta = $dao_con->ConsultarConta();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>

<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php' ;
            include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2> Realizar movimento </h2>
                        <h5> Aqui você poderá realizar seus movimentos de entrada ou saída todas as suas empresas </h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>

                <hr />

                <form action="realizar_movimento.php" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Tipo de movimento </label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Data </label>
                            <input type="date" class="form-control" placeholder="(Coloque a data do movimento)" name="data" id="data"/>
                        </div>
                        <div class="form-group">
                            <label> Valor </label>
                            <input class="form-control" placeholder="Digite o valor" name="valor" id="valor"
                                value="<?= isset($valor) ? $valor : '' ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Categoria </label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php foreach($categoria as $item){ ?> 
                                <option value= "<?= $item['id_categoria'] ?>"> 
                                <?= $item['nome_categoria'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Empresa </label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach($empresa as $item){ ?>
                                <option value="<?= $item['id_empresa'] ?>"> 
                                    <?= $item['nome_empresa'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label> Conta Bancária </label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach ($conta as $item){ ?>
                                <option value=" <?= $item['id_conta'] ?>"> 
                                <?= 'Banco: '.$item['banco_conta'] . ', Agência/Número '.$item['agencia_conta']. ' / ' .$item['numero_conta'] . ' - Saldo: R$ ' . $item['saldo_conta']?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (opcional)</label>
                            <textarea class="form-control" rows="3" placeholder="Digite uma Observação aqui..." name="obs" id="obs" ></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarRealizarMovimento()"> Finaizar lançamento </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</boby>
</html>