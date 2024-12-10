USE banco_php;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nivel ENUM('adm', 'colab') NOT NULL
);

CREATE TABLE alunos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL
);

CREATE TABLE professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    formacao VARCHAR(100) NOT NULL
);

CREATE TABLE cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(25) NOT NULL,
    descricao TEXT NOT NULL,
    aulas_semanais INT NOT NULL,
    professor_id INT,
    FOREIGN KEY (professor_id) REFERENCES professores(id)
);

CREATE TABLE matriculas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATETIME NOT NULL,
    id_alunos INT NOT NULL,
    id_professor INT NOT NULL,
    id_curso INT NOT NULL,
    FOREIGN KEY (id_alunos) REFERENCES alunos(id),
    FOREIGN KEY (id_professor) REFERENCES professores(id),
    FOREIGN KEY (id_curso) REFERENCES cursos(id)
);
