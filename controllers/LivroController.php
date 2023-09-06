<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";

class LivroController{
    private $livroModel;

    public function __construct(){
        $this->livroModel = new Livros();
    }

    public function listaLivro(){
        return $this->livroModel->listar();
    }
}