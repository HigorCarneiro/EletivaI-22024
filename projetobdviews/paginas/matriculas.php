<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/matriculas.php';

    $matriculas = todasMatriculas();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Matrículas</h2>
    <a href="nova_matricula.php" class="btn btn-success mb-3">Nova Matrícula</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th>Aluno</th>
                <th>Professor</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($matriculas as $m) : ?>
            <tr>
                <td><?= $m['id_curso']?></td>
                <td><?= $m['id_aluno']?></td>
                <td><?= $m['id_professor']?></td>
                <td>
                    <a href="excluir_matricula.php?id=<?= $m['id']?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>

            <?php    
                endforeach;
            ?>
            
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>