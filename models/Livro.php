<?php 
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/database/DBConexao.php";

class Livros {

    protected $db;

    protected $table = "livros";

    public function __construct()
    {
        $this->db=DBConexao::getConexao();
    }


    public function buscar($id){
        try{
            $sql="SELECT * FROM {$this->table} WHERE id_livro = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_livro",$id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            
            echo "Erro ao Buscar: " . $e->getMessage(); 
            return null;
        }
    }

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


    public function cadastrar ($dados){
        try{           
            $sql = "INSERT INTO {$this->table} (titulo,autor,numero_pagina,preco,ano_public,isbn)
            VALUES (:titulo,:autor,:numero_pagina,:preco,:ano_public,:isbn)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo',$dados['titulo']);
            $stmt->bindParam(':autor',$dados['autor']);
            $stmt->bindParam(':numeros_pagina',$dados['numeros_pagina']);
            $stmt->bindParam(':preco',$dados['preco']);
            $stmt->bindParam(':ano_public',$dados['ano_public']);
            $stmt->bindParam(':isbn',$dados['isbn']);

            $stmt->execute();
            return true;
            
        }catch(PDOException $e){
            echo "Erro ao cadastrar:".$e->getMessage();
            return false;
        }
    }

    public function editar ($id,$dados){
        try{
            $sql = "UPDATE {$this->table} SET titulo = :titulo, autor = :autor, numeros_paginas = :numeros_paginas, preco = :preco, ano_public = :ano_public, isbn = ;isbn WHERE id_livro = :id_livro";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo',$dados['titulo']);
            $stmt->bindParam(':autor',$dados['autor']);
            $stmt->bindParam(':numeros_paginas',$dados['numeros_paginas']);
            $stmt->bindParam(':preco',$dados['preco']);
            $stmt->bindParam(':ano_public',$dados['ano_public']);
            $stmt->bindParam(':isbn',$dados['isbn']);
            $stmt->bindParam(':id_livro', $id, PDO::PARAM_INT);
            
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo "Erro ao editar:".$e->getMessage();
            return false;
        }



    }
}