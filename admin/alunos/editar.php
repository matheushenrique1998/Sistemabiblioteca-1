<?php 

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";
require_once $_SERVER ['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

$alunoController = new AlunoController();
$student = $alunoController->editarAluno();

?>

<main class = "container mt-3 mb-3">
    <h1>Editar Aluno</h1>

    <form action="editar.php?id=<?=$student->id_aluno?>" method="post" class="row g-3">
    <div class="col-md-12">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" required value="<?=$student->nome?>">
    </div>

    <div class="col-md-6">
        <label for="cpf" class="form-label">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control" ?required value="<?=$student->cpf?>">
    </div>

    <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" name="email" id="email"
        class="form-control" required value="<?=$student->email?>"></input>
    </div>

    <div class="col-md-6">
        <label for="telefone" class="form-label">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" required value="<?=$student->telefone?>">
    </div>
    
    <div class="col-md-6">
        <label for="celular" class="form-label">Celular</label>
        <input type="text" name="celular" id="celular" class="form-control" required value="<?=$student->celular?>">
    </div>

    <div class="col-md-12">
        <label for="data_nascimento" class="form-label">Data De Nascimento</label>
        <input type="text" name="data_nascimento" id="data_nascimento" class="form-control" required value="<?=$student->data_nascimento?>">
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
