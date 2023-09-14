<?php
  require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php";

  require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
  
  if(isset($_GET["del"]) && !empty($_GET['id_usuarios'])){
    
    $usuarioController = new UsuarioController();
    $usuarioController->excluirUsuario();

  }

?>

  <main class="container mt-3 mb-3">
      <h1>Lista de Usúarios
      <a href="cadastrar.php" class = "btn btn-primary float-end">Cadastrar</a>
      </h1>
      
        <?php require_once $_SERVER['DOCUMENT_ROOT']. "/includes/alerta.php";?>


      <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th style="width: 200px;">Ação</th>
            </tr>
        </thead>      
        <tbody>
            
        <?php 

            $usuarioController = new UsuarioController();
            $usuarios = $usuarioController->listaUsuario();
            //var_dump($usuarios);
            foreach($usuarios as $user):
        ?>
            <tr>
                <td><?=$user->id_usuarios?></td>
                <td><?=$user->nome?></td>
                <td><?=$user->email?></td>
                <td><?=$user->perfil?></td>

                <td>
                    <a href = "editar.php?id_usuarios=<?=$user->id_usuarios ?>" class = "btn btn-primary">Editar</a>
                    <a href = "index.php?id_usuarios=<?=$user->id_usuarios?>&del" class = "btn btn-danger">Excluir</a> 
                </td>
            </tr>

        <?php 
            endforeach;
        ?>

        </tbody>
      </table>
  </main>



  <?php 

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
  ?>