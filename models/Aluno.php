<?php 

    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

    class Aluno {
        protected $db;
        protected $table = "alunos";

        public function __construct()
        {
            $this->db=DBConexao::getConexao();
        }

        public function buscar($id_aluno){
            try{
                $sql = "SELECT * FROM {$this->table} WHERE id_aluno = :id_aluno";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":id_aluno", $id_aluno, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_OBJ);
            }catch(Exception $e){

                echo "Erro ao Buscar: ".$e->getMessage();
                return null;
            }
        }

        public function listar (){
            try{
                $sql = "SELECT *FROM {$this->table}";
                $stmt = $this->db->prepare($sql);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ); 
            }catch(Exception $e){
                echo "Erro ao Listar: " . $e->getMessage(); 
                return null;
            }
        }

        public function cadastrar ($dados){
            try{
                $sql = "INSERT INTO {$this->table} (nome,cpf,email,telefone,celular,data_nascimento)
                VALUES (:nome,:cpf,;email,:telefone,:celular,:data_nascimento )";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':nome',$dados['nome']);
                $stmt->bindParam(':cpf',$dados['cpf']);
                $stmt->bindParam(':email',$dados['email']);
                $stmt->bindParam(':telefone',$dados['telefone']);
                $stmt->bindParam(':celular',$dados['celular']);
                $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);

                $stmt->execute();
                return true;
            }catch(Exception $e){
                
                echo "Erro ao cadastrar:".$e->getMessage();
                return false;
            }
        }

        public function editar ($id_aluno,$dados){
            try{
                $sql = "UPDATE {$this->table} SET nome = :nome, cpf = :cpf, email = :email, telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento WHERE id_aluno = :id_aluno";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':nome',$dados['nome']);
                $stmt->bindParam(':email',$dados['email']);
                $stmt->bindParam(':telefone',$dados['telefone']);
                $stmt->bindParam(':celular',$dados['celular']);
                $stmt->bindParam(':data_nascimento',$dados['data_nascimento']);
                $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
                
                $stmt->execute();
                return true;
            }catch(Exception $e){
                echo "Erro ao editar:".$e->getMessage();
                return false;
            }
        }

        public function excluir ($id_aluno){
            try{
                $sql = "DELETE FROM {$this->table} WHERE id_aluno = :id_aluno";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);
                $stmt->execute();
            }catch(Exception $e){
                echo 'Erro ao excluir:'.$e->getMessage();
            }
        }
    }