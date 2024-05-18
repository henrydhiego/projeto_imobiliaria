<?php

require_once 'banco.php';
require_once 'conexao.php';

class usuario extends banco{

    private $id;
    private $login;
    private $senha;
    private $permissao;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getPermissao(){
        return $this->permissao;
    }

    public function setPermissao($permissao){
        $this->permissao = $permissao;
    }

    public function save(){
        $result = false;
        // Cria um objeto do tipo conexão
        $conexao = new conexao();

        // Cria a conexão com o banco de dados
        if($conn = $conexao->getConection()){
            if($this->id > 0){
        //Cria queryde update passando os atributos que serão atualizados
        $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao WHERE id = :id";
            //Prepara query para execução
            $stmt = $conn->prepare($query);
            //Executa a query
            if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao, ':id' => $this->id))){
                $result = $stmt->rowCount();
            }

        }else{
            //Cria query de inserção passando os atributos que serão armazenados
            $query = "insert into usuario (id, login, senha, permissao) values (null,:login,:senha,:permissao)";
            //Prepara a query para a execução
            $stmt = $conn->prepare($query);
            //Executa a query
            if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))){
                $result = $stmt->rowCount();
            }

        }
    }
    return $result;
    }

    public function remove($id){
        $result = false;
        //Cria um objeto do tipo conexão
        $conexao = new conexao();
        //Cria a conexão com o banco de dados
        $conn = $conexao->getConection();
        //Cria a query de remoção
        $query = "DELETE FROM usuario where id = :id";
        //Prepara a query para a execução
        $stmt = $conn->prepare($query);
        //Executa a query
        if ($stmt->execute(array(':id' => $id))){
            $result = true;
        }
        return $result;
        
    }

    public function find($id){
        //Cria um objeto do tipo conexão
        $conexao = new conexao();
        //Cria a conexão com o banco de dados
        $conn = $conexao->getConection();
        //Cria a query de seleção
        $query = "SELECT * from usuario where id = :id";
        //Prepara a query para a execução
        $stmt = $conn->prepare($query);
        //Executa a query
        if($stmt->execute(array(':id' => $id))){
            //Verifica se houve algum resgistro encontrado
            if($stmt->rowCount() > 0) {
            //O resultado da busca será retornado como um objeto de classe
            $result = $stmt->fetchObject(usuario::class);
            }else{
                $result = false;
            }
        return $result;

        }
    }

    public function listAll(){
        $conexao = new conexao();
        $conn = $conexao->getConection();
        $query = "select * from usuario"; 
        $stmt = $conn->prepare($query);
        $result = array();

        if ($stmt->execute()){
            while ($rs = $stmt->fetchObject(usuario::class)) {
                $result[] = $rs;
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function count(){

    }
}

?>