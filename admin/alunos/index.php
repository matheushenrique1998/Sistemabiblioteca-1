<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
?>

    <main class="container mt-3 mb-3">
      <h1>Lista de Alunos
      <a href="cadastrar.php" class = "btn btn-primary float-end">Cadastrar</a>
      </h1>      

      <?php require_once $_SERVER['DOCUMENT_ROOT']. "/includes/alerta.php";?>
      <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Data Nascimento</th>
                    <th style="width: 200px;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $alunoController = new AlunoController();
                    $aluno = $alunoController->listaAluno();
                    
                    foreach($aluno as $student):
                ?>

                <tr>
                    <td><?=$student->id_aluno?></td>
                    <td><?=$student->nome?></td>
                    <td><?=$student->cpf?></td>
                    <td><?=$student->email?></td>
                    <td><?=$student->telefone?></td>
                    <td><?=$student->celular?></td>
                    <td><?=$student->data_nascimento?></td>

                    <td>
                        <a href="editar.php?id_aluno=<?=$student->id_aluno?>" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
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

      

