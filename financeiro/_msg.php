<?php 

    // Validação para identificar o numero enviado via GET para a confirmação de ação (Alterar para Consultar).
    if(isset($_GET['ret'])){
        $ret = $_GET['ret'];
    }

    if(isset($ret)) {
        switch($ret){
            case -6:
                echo '<div class="alert alert-danger">Cadastro inexistente. Nenhum Usuário foi encontrado!</div>';
            break;
            case -5:
                echo '<div class="alert alert-danger">Já existe um cadastro com este E-mail!</div>';
            break;
            case -4:
                echo '<div class="alert alert-danger">O registro não poderá ser excluido, pois está em uso!</div>';
            break;
            case -3:
                echo '<div class="alert alert-warning">Os campos Senha e Repetir Senha devem ser iguais!</div>';
            break;
            case -2:
                echo '<div class="alert alert-warning">Senha deve conter no mínimo 6 caracteres e no máximo 8 caracteres!</div>';
            break;
            case -1:
                echo '<div class="alert alert-danger">Ocorreu um erro na operação. Tente mais tarde!</div>';
            break;
            case 0:
                echo '<div class="alert alert-warning">Preencher o(s) campo(s) obrigatório(s)!</div>';
            break;
            case 1:
                echo '<div class="alert alert-success">Ação realizada com Sucesso!</div>';
            break;
        }
    }