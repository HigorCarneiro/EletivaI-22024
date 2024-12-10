<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/professores.php';

    $professores = todosProfessores();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Professores</h2>
    <a href="novo_professor.php" class="btn btn-success mb-3">Novo Professor</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Formação</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($professores as $p) : ?>
            <tr>
                <td><?= $p['id']?></td>
                <td><?= $p['nome']?></td>
                <td><?= $p['email']?></td>
                <td><?= $p['formacao']?></td>
                <td>
                    <a href="editar_professor.php?id=<?= $a['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_professor.php?id=<?= $a['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
