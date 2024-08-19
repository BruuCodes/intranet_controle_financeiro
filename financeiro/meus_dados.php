<?php

    // === Validação de Sessão do Usuário! ===
    require_once '../DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // ====== Fim da requisição! ======

    require_once '../DAO/UsuarioDAO.php';

    $objdao = new UsuarioDAO();
    $dados = $objdao->CarregarMeusDados();

    if (isset($_POST['btnGravar'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        $ret = $objdao->ValidarLogin($nome, $email);
    }

    //echo'<pre>';
    //print_r($dados);
    //echo '<pre>';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div id="wrapper">
        <?php include_once '_head.php'; ?>
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2> Meus dados </h2>
                        <h5> Nesta página, você poderá alterar seus dados </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="POST">
                    <div class="form-group">
                        <label> Nome </label>
                        <input class="form-control" placeholder="Digite se nome" name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" />
                    </div>
                    <div class="form-group">
                        <label> E_mail </label>
                        <input class="form-control" placeholder="Digite seu e-mail" name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>" />
                    </div>
                    <button type="submit" class="btn btn-success" name="btnGravar" onclick="return ValidarMeusDados()">
                        Salvar </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>