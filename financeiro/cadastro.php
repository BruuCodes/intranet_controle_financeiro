<?php 

    require_once '../DAO/UsuarioDAO.php';

    if(isset($_POST['btnCadastrar'])){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);
        $repSenha = trim($_POST['repSenha']);

        $objDAO = new UsuarioDAO();
        $ret = $objDAO->ValidarCadastro($nome, $email, $senha, $repSenha);

    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /> 
                <?php include_once '_msg.php'; ?> 
                <br />
                <h2> Controle financeiro : Cadastro </h2>
                <h5>( Faça seu cadastro )</h5>
                <br />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher todos os campos </strong>
                    </div>
                    <div class="panel-body">
                        <br />
                        <form action="cadastro.php" method="POST">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                <input type="text" class="form-control" placeholder="Digite seu nome..." name="nome" id= "nome" value="<?= isset($nome) ? $nome : '' ?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="Digite seu E-mail..." name="email" id="email" value="<?= isset($email) ? $email : '' ?>"/> 
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Crie uma senha (mínimo 6 caracteres)" name="senha" id="senha" value="<?= isset($senha) ? $senha : '' ?>"/>
                            </div>  
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Repita a senha criada" name="repSenha" id="repSenha" value="<?= isset($repSenha) ? $repSenha : '' ?>"/>
                            </div>
                            <button class="btn btn-success" name="btnCadastrar" onclick="return ValidarCadastro()">Finalizar cadastro</button>
                        </form>
                        <hr />
                        Já passou cadastro ? <a href="login.php">Clique aqui!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>