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

    public function listarPessoas(){
        try {
            $instancia = $this->conexao->query('SELECT * FROM pessoas');
            $pessoas = $instancia->fetchAll(PDO::FETCH_ASSOC);
            return $pessoas;
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

}//Fim da Classe

?>
