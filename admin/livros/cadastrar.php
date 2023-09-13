<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

    $livroController = new LivroController();
    
    $livroController->cadastrarLivro();
?>

<main class="container mt-3 mb-3">
    <h1>Cadastrar Livros</h1>

    <form action="cadastrar.php" method="post" class="row g-3">
        <div  class=" col-md-12">
            <label for="titulo" class="form-label">Título</label>
            <input type="titulo" name="titulo" id="titulo" class="form-control"
            required>
        </div>

        <div class="col-md-6">
            <label for="autor" class="form-label">Autor</label>
            <input type="autor" name="autor" id="autor" class="form-control"
            required>
        </div>

        <div class="col-md-6">
            <label for="numeros_pagina" class="form-label">Números de Páginas</label>
            <input type="numeros_pagina" name="numeros_pagina" id="numeros_pagina" class="form-control"
            required>
        </div>

        <div class="col-md-6">
            <label for="preco" class="form-label">Preço</label>
            <input type="preco" name="preco" id="preco" class="form-control"
            required>
        </div>

        <div class="col-md-6">
            <label for="ano_public" class="form-label">Ano Publicação</label>
            <select name="ano_public" class="form-ano_public" id="ano_public" required>
        </div>

        <div class="col-md-6">
            <label for="isbn" class="form-label">ISBN</label>
            <select name="isbn" class="form-isbn" id="isbn" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a> 
        </div>
    </form>
</main>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>