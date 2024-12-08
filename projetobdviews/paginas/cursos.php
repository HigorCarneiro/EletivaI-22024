<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
?>

<div class="container mt-5">
    <h2>Gerenciamento de Cursos</h2>
    <a href="novo_curso.php" class="btn btn-success mb-3">Novo Curso</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descriçaõ</th>
                <th>Aulas semanais</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Curso 1</td>
                <td>
                    <a href="editar_curso.php" class="btn btn-warning">Editar</a>
                    <a href="excluir_curso.php" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
