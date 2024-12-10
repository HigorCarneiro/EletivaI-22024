<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/usuarios.php';

    $erro = "";
    
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: usuarios.php');
        exit();
    }

    $id = $_GET['id'];
    $usuario = retornaUsuarioPorId($id);
    if (!$usuario) {
        header('Location: usuarios.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            if (empty($nome) || empty($email) || empty($senha)) {
                $erro = "Todos os campos são obrigatórios!";
            } else {
                if (editarUsuario($id, $nome, $email, $senha)) {
                    header('Location: usuarios.php');
                    exit();
                } else {
                    $erro = "Erro ao editar o usuário!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }

?>

<div class="container mt-5">
    <h2>Editar Usuário</h2>

    <?php if (!empty($erro)): ?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?= $usuario['nome'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $usuario['email'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
