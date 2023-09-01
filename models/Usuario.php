<?php 

class Usuario{

    protected $db;
    protected $table = "usuarios";
    
    
    public function __construct()
    {
        $this->db=DBConexao::getConexao();
    }

    /**
     * Busca registro único
     * @param int $id
     * @return Usario
     */
    public function buscar($id){

    }

    /**
     * Listar todos os registros da tabela usuário
     */
    public function listar(){

    }

    /**
     * Cadastar usuário
     * @param array $dados 
     * @return bool
     */
    public function cadastrar ($dados){
        try{           
            $sql = "INSERT INTO {$this->table} (nome,email,senha,perfil)
            VALUES (:nome,:email,:senha,:perfil)";
            $stmt = $this->db->prepare($sql);

            
        }catch(PDOException $e){
            echo "Erro na preparação da consulta:".$e->getMessage();
        }
            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam('email',$dados['nome']);
            $stmt->bindParam('senha',$dados['senha']);
            $stmt->bindParam('perfil',$dados['perfil']);
            
            try{
                $stmt->execute();
                echo "Inserção bem-sucedida!";
            }catch(PDOException $e){
                echo "Erro na inserção:" . $e->getMessage();
            }
    }

    /**
     * Editar usuário
     * @param int $id 
     * @param array $dados
     * @return bool
     */
    public function editar ($id,$dados){
        try{
            $sql = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id = :id";
            $stmt = $this->db->prepare($sql);
        }catch(PDOException $e){
            echo "Erro na preparaçao da consulta:".$e->getMessage();
        }

        $stmt->bindParam(':nome',$dados['nome']);
        $stmt->bindParam(':email',$dados['email']);
        $stmt->bindParam(':senha',$dados['senha']);
        $stmt->bindParam(':perfil',$dados['perfil']);

        try{
            $stmt->execute();
            echo "Seus dados foram atualizados com Sucesso!";
        }catch(PDOException $e){
            echo "Erro na inserção:" . $e->getMessage();
        }
    }

    //Excluir usuário
    public function excluir ($id){

    }
}