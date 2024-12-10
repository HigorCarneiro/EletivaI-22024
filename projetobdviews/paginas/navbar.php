<?php
    session_start();
    if(!isset($_SESSION['acesso'])){
        header('Location: login.php');        
    }
?>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../paginas/dashboard.php">Sistema de Gerenciamento de Cursos On-line</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <?php if ($_SESSION['nivel'] == 'adm'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="../paginas/usuarios.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuários
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="usuarios.php">Gerenciar</a></li>
              <li><a class="dropdown-iten" href="novo_usuario.php">Cadastrar</a></li>
            </ul>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../paginas/cursos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cursos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../paginas/cursos.php">Gerenciar</a></li>
            <li><a class="dropdown-item" href="../paginas/novo_curso.php">Cadastrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../paginas/professores.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Professores
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../paginas/professores.php">Gerenciar</a></li>
            <li><a class="dropdown-item" href="../paginas/novo_professor.php">Cadastrar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../paginas/alunos.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Alunos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../paginas/alunos.php">Gerenciar</a></li>
            <li><a class="dropdown-item" href="../paginas/novo_aluno.php">Cadastrar</a></li>
          </ul>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../paginas/matriculas.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Matrículas
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../paginas/matriculas.php">Gerenciar</a></li>
            <li><a class="dropdown-item" href="../paginas/nova_matricula.php">Cadastrar</a></li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Seja bem vindo(a) 
                    <?php
                      if (isset($_SESSION['usuario']))
                        echo $_SESSION['usuario'];
                    ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="editar_usuario.php">Editar dados</a></li>
                    <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                </ul>
            </li>
        </ul>
    </div>
  </div>
</nav>
