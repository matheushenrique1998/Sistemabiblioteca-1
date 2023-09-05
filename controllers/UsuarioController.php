<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Usuario.php";
    
class UsuarioController{

    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function listaUsuario(){
        
        return $this->usuarioModel->listar();
    }
}