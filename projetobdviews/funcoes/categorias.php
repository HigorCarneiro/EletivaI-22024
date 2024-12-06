<?php

    declare(strict_types=1);

    require_once "../config/bancodedados.php";

    function buscarCurso() : array{
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM cursos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarAluno() : array{
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM alunos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarProfessor() : array{
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM professores");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>