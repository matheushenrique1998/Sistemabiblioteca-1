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

    public function cadastrarUsuario()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $dados = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'],PASSWORD_DEFAULT),
                'perfil' => $_POST['perfil']
            ];
            $this->usuarioModel->cadastrar($dados);

            header('Location: index.php');
            exit;
        }
    }

    public function editarUsuario(){
        $id_usuarios = $_GET['id_usuarios'];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(isset($_POST['senha']) && !empty($_POST['senha'])){
                //Criar nova senha
                $novaSenha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            }else{
                //Manter senha Antiga
                $usuario = $this->usuarioModel->buscar($id_usuarios);
                $novaSenha = $usuario->senha;
            }

            $dados = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => password_hash($_POST['senha'],PASSWORD_DEFAULT),
                'perfil' => $_POST['perfil']
            ];
            $this->usuarioModel->editar($id_usuarios, $dados);

            header('Location: index.php');
            exit;
        }
        return $this->usuarioModel->buscar($id_usuarios);
    }

    public function excluirUsuario(){
        $this->usuarioModel->excluir($_GET['id_usuarios']);

        header('Location: index.php');
        exit;
    }
}
