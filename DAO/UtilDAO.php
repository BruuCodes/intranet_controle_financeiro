<?php

    //Essa classe vai futuramente criar a sessão de acesso ao usuário!
    // No início de uso dessa Classe, ela vai simular um acesso de Usuário Manualmente!

    class UtilDAO{
        // public static function UsuarioLogado(){
        //     return 1; // Simula o acesso do usuário de ID 1 cadastro do Banco de dados!
        // }

        // 1º: Inicializa a contrução da sessão de usuario logado.
        private static function IniciarSessao(){
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        //2º: Esta function vai chamar a function IniciarSessao para construir o log.
        public static function CriarSessao($cod, $nome){
            // Comando self chama uma Função estatica.
            self::IniciarSessao();

            // Comando que identifica o numero e o nome do usuário que está realizando o acesso as sistema
            $_SESSION['cod'] = $cod;
            $_SESSION['nome'] = $nome;
        }

        //3º: Este processo chama a function anterior e indentificar o NOME DO USUARIO que vai ser logado.
        public static function NomeLogado(){
            self::IniciarSessao();
            return $_SESSION['nome'];
        }

        //4º: Este processo chama a function anterior e identifica o ID que vai se logado
        public static function UsuarioLogado(){
            self::IniciarSessao();
            return $_SESSION['cod'];
        }

        //5º: Este proceso destroi toda a permissão construida através das sessões, removendo o USUARIO da aplicação
        public static function Deslogar(){
            self::IniciarSessao();

            unset($_SESSION['cod']);
            unset($_SESSION['nome']);

            header('location: login.php');
            exit;
        }

        //6º: Esta function realiza uma verificaçãom se existe dados do usuario na sessão, caso não, retorna para a tela de login (login.php)
        public static function VerificarLogado(){
            self::IniciarSessao();

            if (!isset($_SESSION['cod']) || $_SESSION['cod'] == '') {
                header('location: login.php');
                exit;
            }
        }
    }