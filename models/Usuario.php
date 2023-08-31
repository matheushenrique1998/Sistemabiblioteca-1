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

    }

    /**
     * Editar usuário
     * @param int $id 
     * @param array $dados
     * @return bool
     */
    public function editar ($id,$dados){

    }

    //Excluir usuário
    public function excluir ($id){

    }
}