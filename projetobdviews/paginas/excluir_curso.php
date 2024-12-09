<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/cursos.php';

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
            $id = intval($_POST['id']);
            if (excluirCurso($id)){
                header('Location: cursos.php');
                exit();
            } else {
                $erro = "Erro ao excluir o curso!";
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    } else {
        if (isset($_GET['id'])){
            $id = intval($_GET['id']);
            $curso = retornaCursoPorId($id);
            if ($curso == null){
                header('Location: cursos.php');
                exit();
            }
        } else {
            header('Location: cursos.php');
            exit();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Curso</h2>
    
    <p>Tem certeza de que deseja excluir o curso abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= $curso['nome'] ?></li>
        <li><strong>Descrição:</strong> <?= $curso['descricao'] ?></li>
        <li><strong>Aulas semanais:</strong> <?= $curso['aulas_semanais'] ?></li>
        <li><strong>Professor:</strong> <?= $curso['professor_id'] ?></li>
    </ul>
    <form method="post">
    <input type="hidden" name="id" value="<?= $curso['id'] ?>" />
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="cursos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
