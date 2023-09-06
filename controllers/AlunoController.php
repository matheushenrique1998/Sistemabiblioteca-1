<?php 

    require_once $_SERVER ['DOCUMENT_ROOT'] . "/models/Aluno.php";

class AlunoController{
    
    private $alunoModel;
    
    public function __construct(){

        $this->alunoModel = new Aluno();
    }

    public function listaAluno(){
        
        return $this->alunoModel->listar();
    }
}