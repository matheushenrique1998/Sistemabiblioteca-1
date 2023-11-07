<?php 
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Usuario{

    protected $db;
    protected $table = "usuarios";
    
    
    public function __construct()
    {
        $this->db=DBConexao::getConexao();
    }

    
    public function buscar($id_usuarios){
        try{
            $sql="SELECT * FROM {$this->table} WHERE id_usuarios=:id_usuarios";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_usuarios",$id_usuarios, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            
            echo "Erro ao Buscar: " . $e->getMessage(); 
            return null;
        }
    }

    /**
     * Listar todos os registros da tabela usuário
     */
    public function listar(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);            
        }catch(PDOException $e){

            echo "Erro ao Listar: " . $e->getMessage(); 
            return null;
        }
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
            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);

            $stmt->execute();
            $_SESSION['sucesso'] = "Cadastro realizado com sucesso!";
            return true;
            
        }catch(PDOException $e){
            echo "Erro ao cadastrar:".$e->getMessage();

            $_SESSION['erro'] = "Erro ao cadastrar o usuário!";
            return false;
        }
    }

    /**
     * Editar usuário
     * @param int $id 
     * @param array $dados
     * @return bool
     */
    public function editar ($id_usuarios,$dados){
        try{
            $sql = "UPDATE {$this->table} SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id_usuarios = :id_usuarios";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nome',$dados['nome']);
            $stmt->bindParam(':email',$dados['email']);
            $stmt->bindParam(':senha',$dados['senha']);
            $stmt->bindParam(':perfil',$dados['perfil']);
            $stmt->bindParam(':id_usuarios', $id_usuarios, PDO::PARAM_INT);
            
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuário editado com sucesso";
            return true;

        }catch(PDOException $e){
            echo "Erro ao editar:".$e->getMessage();
            return false;
        }
    }

    //Excluir usuário
    public function excluir ($id_usuarios){
        try{
            $sql = "DELETE FROM {$this->table} WHERE id_usuarios = :id_usuarios";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_usuarios', $id_usuarios, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION['sucesso'] = "Usuário excluido com sucesso!!";
        }catch(PDOException $e){
            echo 'Erro ao excluir:'.$e->getMessage();
        }
    }
}