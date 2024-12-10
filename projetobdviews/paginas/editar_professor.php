<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/professores.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: professores.php');
        exit();
    }

    $professor = retornaProfessorPorId($id);
    if (!$professor){
        header('Location: professores.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $nome = $_POST['nome'];
            $email = intval($_POST['email']);
            $formacao = $_POST['formacao'];
            $id = intval($_POST['id']);
            if (empty($nome)){
                $erro = "Preencha os campos obrigatórios!";
            } else {
                if (editarProfessor($id, $nome, $email, $formacao)){
                            header('Location: professores.php');
                            exit();
                        } else {
                            $erro = "Erro ao editar o professor!";
                        }
            }

        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Professor</h2>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= $professor['nome'] ?>" id="nome" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" name="email" value="<?= $professor['email'] ?>" id="email" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="formacao" class="form-label">Matéria aplicada</label>
            <input type="text" name="formacao" value="<?= $professor['formacao'] ?>" id="formacao" class="form-control" value="" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar professor</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>