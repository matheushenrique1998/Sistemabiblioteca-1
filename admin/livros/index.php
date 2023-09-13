<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

?>

    <main class="container mt-3 mb-3">
      <h1>Lista de Usúarios
      <a href="cadastrar.php" class = "btn btn-primary float-end">Cadastrar</a>
      </h1>

      <table class = "table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Números de Páginas</th>
                <th>Preço</th>
                <th>ISBN</th>
                <th>Ação</th>
            </tr>
        </thead>

      <tbody>
        <?php 
            $livroController = new livroController();
            $livro = $livroController->listaLivro();

            foreach($livro as $book):
        ?>

        <tr>
            <td><?=$book->id_livro?></td>
            <td><?=$book->titulo?></td>
            <td><?=$book->autor?></td>
            <td><?=$book->numero_pagina?></td>
            <td><?=$book->preco?></td>
            <td><?=$book->ano_public?></td>
            <td><?=$book->isbn?></td>
            
            <td>
                <a href="editar.php/id=<?$book->id_livro?>" class = "btn btn-primary">Editar</a>
                <a href="#" class = "btn btn-danger">Excluir</a>
            </td>
        </tr>
    
        <?php
            endforeach;
        ?>

      </tbody>
      </table>
</main>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] ."/includes/rodape.php";
?>