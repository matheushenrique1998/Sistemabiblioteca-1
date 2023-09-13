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

    public function cadastrarLivro()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numeros_pagina' => $_POST['numeros_pagina'],
                'ano_public' => $_POST['ano_public'],
                'isbn' => $_POST['isbn']
            ];
            $this->livroModel->cadastrar($dados);

            header('Location: index.php');
            exit;
        }
    }

    public function editarLivro(){
        $id = $_GET['id'];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numeros_pagina' => $_POST['numeros_pagina'],
                'ano_public' => $_POST['ano_public'],
                'isbn' => $_POST['isbn']
            ];
            $this->livroModel->editar($id, $dados);

            header('Location: index.php');
            exit;
        }

        return $this->livroModel->buscar($id);
    }
}