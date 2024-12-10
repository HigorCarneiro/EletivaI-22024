<?php
    // Código PHP
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/matriculas.php';
    require_once '../funcoes/cursos.php';
    require_once '../funcoes/alunos.php';
    require_once '../funcoes/professores.php';

    $curso = todosCursos();
    $alunos = todosAlunos();
    $professores = todosProfessores();
    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id_aluno = intval($_POST['id_aluno']);
            $id_professor = intval($_POST['id_professor']);
            $id_curso = intval($_POST['id_curso']);

            if (empty($id_aluno) || empty($id_professor) || empty($id_curso)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (cadastrarMatricula($id_aluno, $id_professor, $id_curso)){
                    header('Location: matriculas.php');
                    exit();
                } else {
                    $erro = "Erro ao criar a matrícula!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova Matrícula</h2>

    <!-- Exibir a mensagem de erro, caso exista -->
    <?php if (!empty($erro)): ?>
        <div class="alert alert-danger">
            <?= $erro; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="Curso" class="form-label">Curso</label>
            <select name="id_curso" id="curso_id" class="form-control" required>
                <?php foreach ($curso as $c): ?>
                    <option value="<?= $c['id']?>"><?= $c['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="Aluno" class="form-label">Aluno</label>
            <select name="id_aluno" id="aluno_id" class="form-control" required>
                <?php foreach ($alunos as $a): ?>
                    <option value="<?= $a['id']?>"><?= $a['nome'] ?></option>
                <?php endforeach; ?>
            </select>
            <label for="Professor" class="form-label">Professor</label>
            <select name="id_professor" id="professor_id" class="form-control" required>
                <?php foreach ($professores as $p): ?>
                    <option value="<?= $p['id']?>"><?= $p['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Matrícula</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
