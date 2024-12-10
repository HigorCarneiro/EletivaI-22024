<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/cursos.php'; //curso
    require_once '../funcoes/professores.php';

    $professores = todosProfessores();
    $erro = "";

    $id = $_GET['id'];
    if (!$id){
        header('Location: cursos.php');
        exit();
    }

    $curso = retornaCursoPorId($id);
    if (!$curso){
        header('Location: cursos.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $aulas_semanais = intval($_POST['aulas_semanais']);
            $professor_id = intval($_POST['professor_id']);

            if (empty($nome) || empty($descricao) || empty($aulas_semanais)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (editarCurso($id, $nome, $descricao, $aulas_semanais, $professor_id)){
                    header('Location: cursos.php');
                    exit();
                } else {
                    $erro = "Erro ao editar o curso!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Curso</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $curso['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" required><?= $curso['descricao'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="aulas_semanais" class="form-label">Aulas semanais</label>
            <input type="number" name="aulas_semanais" id="aulas_semanais" class="form-control" value="<?= $curso['aulas_semanais'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="professor_id" class="form-label">Professor</label>
            <select name="professor_id" id="professor_id" class="form-control" required>
                <?php foreach ($professores as $p): ?>
                    <option value="<?= $p['id']?>" <?= ($curso['professor_id'] == $p['id']) ? 'selected' : '' ?>><?= $p['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Curso</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
