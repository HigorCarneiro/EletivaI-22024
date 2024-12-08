<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/alunos.php';
?>

<div class="container mt-5">
    <h2>Gerenciamento de Alunos</h2>
    <a href="novo_aluno.php" class="btn btn-success mb-3">Novo Aluno</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

                $alunos = todosAlunos();
                foreach ($alunos as $a):
            ?>

            <tr>
                <td><?= $a['id']?></td>
                <td><?= $a['nome']?></td>
                <td><?= $a['idade']?></td>
                <td>
                    <a href="excluir_aluno.php?id=<?= $a['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
