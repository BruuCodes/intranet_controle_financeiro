<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/EmpresaDAO.php';

    if(isset($_POST['btnGravar'])){
        $nome = trim($_POST['nomeEmpresa']);
        $telefone = trim($_POST['telefone']);
        $endereco = trim($_POST['endereco']);

        $objDAO = new EmpresaDAO();
        $ret = $objDAO->CadastrarEmpresa($nome, $telefone, $endereco);
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
    include_once '_topo.php' ;
    include_once '_menu.php';
     ?>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2> Nova Empresa </h2>
                        <h5> Aqui você poderá cadastrar todas as suas empresas </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form method="Post" action="nova_empresa.php">
                    <div class="form-group">
                        <label> Nome da empresa</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa..." name="nomeEmpresa" id="nomeEmpresa" value="<?= isset($nomeEmpresa) ? $nomeEmpresa : '' ?>"/>
                    </div>

                    <div class="form-group">
                        <label> Telefone </label>
                        <input class="form-control" placeholder="Digite o telefone da Empresa (Opcional)" name="telefone"  id="telefone" value="<?=isset($telefone) ? $telefone : ''?>"/>
                    </div>
                    <div class="form-group">
                        <label> Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da Empresa (Opcional)" name= "endereco" id="endereco" value="<?= isset($endereco) ? $endereco : '' ?>"/>
                    </div>

                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarEmpresa()"> Salvar </button>
                </form>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
        </boby>

</html>