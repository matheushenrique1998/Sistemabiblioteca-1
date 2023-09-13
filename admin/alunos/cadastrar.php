<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

    $alunoController = new AlunoController();
    
    $alunoController->cadastrarAluno();
?>

<main class="container mt-3 mb-3">
    <h1>Cadastrar Aluno</h1>

    <form action="cadastrar.php" method="post" class="row g-3">
        <div  class="col-md-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="nome" name="nome" id="nome" class="form-control"
            required>
        </div>

        <div class="col-md-6">
            <label for="cpf" class="cpf">CPF</label>
            <input type="cpf" name="cpf" id="cpf" class="form-control" required>
        </div>

        <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email"
        class="form-control" required></input>
    </div>

    <div class="col-md-6">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="telefone" name="telefone" id="telefone" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="celular" class="form-label">Celular</label>
        <input type="celular" name="celular" id="celular" class="form-control" required>
    </div>

    <div class="col-md-12">
        <label for="data_nascimento" class="form-label">Data De Nascimento</label>
        <input type="data_nascimento" name="data_nascimento" id="data_nascimento" class="form-control" required>
    </div>

    <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a> 
        </div>
</main>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";
?>