var notificar = "Preecher o campo obrigatório";

// Validação da tela de Login
function ValidarLogin() {
    if ($("email").val().trim() == '') {
        alert(notificar + "E-MAIL");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo  obrigatório SENHA");
        $("#senha").focus();
        return false;

    }

    if ($("#senha").val() < 6 && $("#senha").val() > 8) {
        alert("A SENHA deve conter entre 6 e 8 caracteres!");
        $("#senha").focus();
        return false;
    }
}

function ValidarCadastro() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo nome");
        $("nome").focus();
        return false;
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher campo E-mail");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher campo SENHA");
        $("#senha").focus();
        return false;
    }

    if ($("#senha").val() < 6 && $("#senha").val() > 8) {
        alert("A SENHA deve conter entre 6 e 8 caracteres!");
        $("#senha").focus();
        return false;
    }

    if ($("#repSenha").val().trim() == '') {
        alert("Preencher campo REPETIR SENHA");
        $("#repSenha").focus();
        return false;
    }

    if ($("#senha").val() != $("#repSenha").val()) {
        alert("As SENHAS devem ser iguais!");
        $("#repSenha").focus();
        return false;
    }
}
function ValidarMeusDados() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME");
        $("#nome").focus();
        return false;
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo obrigatório EMAIL");
        $("#email").focus();
        return false;
    }
}
function ValidarCategoria() {
    if ($("#categoria").val().trim() == '') {
        alert("Prencher campo obrigatório NOME DA CATEGORIA!");
        $("#categoria").focus();
        return false;
    }
}
function ValidarEmpresa() {
    if ($("#nomeEmpresa").val().trim() == '') {
        alert("Preencher campo obrigatório NOME DA EMPRESA");
        $("#nomeEmpresa").focus();
        return false;
    }

    if ($("#telefone").val().trim() == '') {
        alert("Preencher campo obrigatório TELEFONE");
        $("#telefone").focus();
        return false;
    }

    if ($("#endereco").val().trim() == '') {
        alert("Preencher campo obrigatório ENDEREÇO DA EMPRESA");
        $("#endereco").focus();
        return false;
    }

}
function ValidarConta() {
    if ($("#banco").val().trim() == '') {
        alert("Preencher campo obrigatório NOME DO BANCO ");
        $("#banco").focus();
        return false;
    }

    if ($("#agencia").val().trim() == '') {
        alert("Preencher campo obrigatório NOME DA AGÊNCIA");
        $("#agencia").focus();
        return false;
    }

    if ($("#numero").val().trim() == '') {
        alert("Preencher campo obrigatório NÚMERO DA CONTA");
        $("#numero").focus();
        return false;
    }

    if ($("#saldo").val().trim() == '') {
        alert("Preencher campo obrigatório VALOR (R$)!");
        $("#saldo").focus();
        return false;
    }
}
function ValidarRealizarMovimento() {
    if ($("#tipo").val().trim() == '') {
        alert("Selecione um TIPO DE MOVIMENTO");
        $("#tipo").focus();
        return false;
    }

    if ($("#data").val().trim() == '') {
        alert("Selecione um DATA");
        $("#data").focus();
        return false;
    }

    if ($("#valor").val().trim() == '') {
        alert("Preencha o campo VALOR");
        $("#valor").focus();
        return false;
    }

    if ($("#categoria").val().trim() == '') {
        alert("Selecione uma CATEGORIA");
        $("#categoria").focus();
        return false;
    }

    if ($("#empresa").val().trim() == '') {
        alert("Selecione uma EMPRESA");
        $("#empresa").focus();
        return false;
    }

    if ($("#conta").val().trim() == '') {
        alert("Selecione uma CONTA BANCÁRIA");
        $("#conta").focus();
        return false;
    }
}

function ValidarConsultarMovimento() {
    if ($("#tipoMov").val().trim() == '') {
        alert("Selecione um TIPO DE MOVIMENTO");
        $("#tipoMov").focus();
        return false;
    }

    if ($("#dtInicio").val().trim() == '') {
        alert("Selecione uma DATA DE INÍCIO");
        $("#dtInicio").focus();
        return false;
    }

    if ($("#dtFinal").val().trim() == '') {
        alert("Selecione uma DATA FINAL!");
        $("#dtFinal").focus();
        return false;
    }

}