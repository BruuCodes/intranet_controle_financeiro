<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao
{
    public function CadastrarCategoria($nomeCategoria)
    {
        if ($nomeCategoria == '') {
            return 0;
        } else {
            // return 1;

            // 1º Passo: Essa variavel recebe a herança da classe Conexao.
            $conexao = parent::retornarConexao();

            // 2º Passo: Essa variavel contem o script sql que sera executado dentro do Banco de Dados.
            $comando_sql = 'insert into tb_categoria(nome_categoria, id_usuario) values(?, ?);';

            // 3º Passo: Esse objeto sql, vai receber todos os recursos da Função Nativa do PHP PDO.
            // Obs: PDO é um gerenciamento completo de ações, executadas via PHP dentro do Banco de Dados.
            $sql = new  PDOStatement();

            // 4º Passo: Codigo do script sql sera preparado para a execução no Bando de Dados!
            $sql = $conexao->prepare($comando_sql);

            // 5º Passo: Vamos validar e identificar os dados que esta sendo encaminhado para o Banco de Dados.
            $sql->bindValue(1, $nomeCategoria);
            $sql->bindValue(2, UtilDAO::UsuarioLogado());

            // 6º Passo: Agora os processos seram executados. Try tenta executar porem, caso algo de errado aconteça,
            // o catch vai realizar o tratamento e a notificação ao usuario.
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }

    public function ConsultarCategoria()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharCategoria($idCategoria)
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_categoria = ? and id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idCategoria);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return  $sql->fetchAll();
    }

    public function AlterarCategoria($nomeCategoria, $idCategoria)
    {
        if (trim($nomeCategoria) == '' || $idCategoria == '') {
            return 0;
        } else {
            $conexao = parent::retornarConexao();

            $comando_sql = 'update tb_categoria set nome_categoria = ? where id_categoria = ? and id_usuario = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $nomeCategoria);
            $sql->bindValue(2, $idCategoria);
            $sql->bindValue(3, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }

    public function ExcluirCategoria($idCategoria)
    {
        if ($idCategoria == '') {
            return 0;
        }else{
            $conexao = parent::retornarConexao();

            $comando_sql = 'delete from tb_categoria where id_categoria = ? and id_usuario = ?';
    
            $sql = new PDOStatement();
    
            $sql = $conexao->prepare($comando_sql);
    
            $sql->bindValue(1, $idCategoria);
            $sql->bindValue(2, UtilDAO::UsuarioLogado());
    
            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -4;
            }
        }
    }
}
