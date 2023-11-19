<?php

class Banco{

    private $conexao;

    public function __construct(){
        try {
            $this->conexao = new PDO('mysql:host=localhost;dbname=agenda', 'root', '');
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }//Fim do construtor

    public function listarPessoas($busca){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM pessoas WHERE nome LIKE "%'.$busca.'%" ORDER BY id DESC');
            $pessoas = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $pessoas;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function pegarContatos($id){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM contatos WHERE pessoas_id = '.$id);
            $contatos = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $contatos;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function pegarPessoa($id){
        try {
            $instancia = $this->conexao->
            query('SELECT * FROM pessoas WHERE id = '.$id);
            $pessoas = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $pessoas[0];
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function listarUsuarios(){
        try {
            $instancia = $this->conexao->query('SELECT * FROM users');
            $usuarios = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function cadastrarPessoa($nome, $email){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO pessoas (nome, email) VALUES (:nome, :email)");
            $intancia->bindParam(':nome',$nome);
            $intancia->bindParam(':email', $email);
            $intancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function cadastrarContato($telefone, $id){
        try{
            $intancia = $this->conexao
                ->prepare("INSERT INTO contatos (telefone, pessoas_id) VALUES (:telefone, :pessoas_id)");
            $intancia->bindParam(':telefone',$telefone);
            $intancia->bindParam(':pessoas_id', $id);
            $intancia->execute();

        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function excluirPessoa($id){
        try{
            $instancia = $this->conexao->prepare("DELETE FROM pessoas WHERE id = :id");
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }

    public function excluirContato($id){
        try{
            $instancia = $this->conexao->prepare("DELETE FROM contatos WHERE id = :id");
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }

    public function editarPessoa($id, $nome, $email){
        try{
            $instancia = $this->conexao->prepare("UPDATE pessoas SET nome = :nome, email = :email WHERE id = :id");
            $instancia->bindParam(':nome', $nome);
            $instancia->bindParam(':email', $email);
            $instancia->bindParam(':id', $id);
            $instancia->execute();
        }catch (PDOException $ex){
            $ex->getMessage();
        }
    }

}//Fim da Classe

?>
