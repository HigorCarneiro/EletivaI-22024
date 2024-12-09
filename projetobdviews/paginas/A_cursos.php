<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/cursos.php';

    $cursos = todosCursos();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Cursos</h2>
    <a href="novo_curso.php" class="btn btn-success mb-3">Novo Curso</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Aulas semanais</th>
                <th>Professor</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($cursos as $c) : ?>
            <tr>
                <td><?= $c['id']?></td>
                <td><?= $c['nome']?></td>
                <td><?= $c['descricao']?></td>
                <td><?= $c['aulas_semanais']?></td>
                <td><?= $c['professor_id']?></td>
                <td>
                    <a href="editar_curso.php?id=<?= $c['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_curso.php?id=<?= $c['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>