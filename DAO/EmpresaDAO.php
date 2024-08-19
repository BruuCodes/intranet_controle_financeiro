<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class EmpresaDAO extends Conexao
{
    public function CadastrarEmpresa($nomeEmpresa, $telefone, $endereco)
    {
        if ($nomeEmpresa == '' || $telefone == '' || $endereco == '') {
            return 0;
        } else {
            // return 1;

            $conexao = parent::retornarConexao();

            $comando_sql = 'Insert into tb_empresa(nome_empresa, telefone_empresa, endereco_empresa, id_usuario) values(?,?,?,?);';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $nomeEmpresa);
            $sql->bindValue(2, $telefone);
            $sql->bindValue(3, $endereco);
            $sql->bindValue(4, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }

    public function ConsultarEmpresa()
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_empresa, nome_empresa, telefone_empresa, endereco_empresa from tb_empresa where id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function DetalharEmpresa($idEmpresa)
    {
        $conexao = parent::retornarConexao();

        $comando_sql = 'select id_empresa, nome_empresa, telefone_empresa, endereco_empresa from tb_empresa where id_empresa = ? and id_usuario = ?';

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando_sql);

        $sql->bindValue(1, $idEmpresa);
        $sql->bindValue(2, UtilDAO::UsuarioLogado());

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarEmpresa($nomeEmpresa, $telefone, $endereco, $idEmpresa)
    {
        if ($nomeEmpresa == '' || $telefone == '' || $endereco == '' || $idEmpresa == '') {
            return 0;
        } else {
            //; return 1;

            $conexao = parent::retornarConexao();

            $comando_sql = 'update tb_empresa set nome_empresa = ?, telefone_empresa = ?, endereco_empresa = ? where id_empresa = ? and id_usuario = ?';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, $nomeEmpresa);
            $sql->bindValue(2, $telefone);
            $sql->bindValue(3, $endereco);
            $sql->bindValue(4, $idEmpresa);
            $sql->bindValue(5, UtilDAO::UsuarioLogado());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }
    }


    public function ExcluirEmpresa($idEmpresa)
    {
        if ($idEmpresa == '') {;
            return 0;
        }else{
            $conexao = parent::retornarConexao();

            $comando_sql = 'select from tb_empresa where id_empresa = ? and id_usuario = ?';
            $comando_sql = 'delete from tb_empresa where id_empresa = ? and id_usuario = ?';
    
            $sql = new PDOStatement();
    
            $sql = $conexao->prepare($comando_sql);
    
            $sql->bindValue(1, $idEmpresa);
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
