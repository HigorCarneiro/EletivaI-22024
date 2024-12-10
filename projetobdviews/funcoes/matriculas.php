<?php

declare(strict_types = 1);

require_once('../config/bancodedados.php');

function gerarDadosGrafico(): array {
    global $pdo;
    $stmt = $pdo->query("SELECT 
                        p.id,
                        p.nome,
                        SUM(c.quantidade) as estoque 
                            FROM compra c
                            INNER JOIN produto p ON p.id = c.produto_id
                            GROUP BY p.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function cadastrarMatricula(int $id_aluno, int $id_professor, int $id_curso) {
    global $pdo;
    $stament = $pdo->prepare("INSERT INTO matriculas (id_aluno, id_professor, id_curso) VALUES (?, ?, ?)");
    return $stament->execute([$id_aluno, $id_professor, $id_curso]);
}

function todasMatriculas(): array{
    global $pdo;
    $stament = $pdo->query(" SELECT * FROM matriculas");
    return $stament->fetchAll(PDO::FETCH_ASSOC);
}

function excluirMatricula(int $id) : bool {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM matriculas WHERE id = ?");
    return $stmt->execute([$id]);
}

function retornaMatriculaPorId(int $id): ?array{
    global $pdo;
    $stament = $pdo->prepare("SELECT * FROM matriculas WHERE id = ?");
    $stament->execute([$id]);
    $matricula = $stament->fetch(PDO::FETCH_ASSOC);
    return $matricula ? $matricula : null;
} 