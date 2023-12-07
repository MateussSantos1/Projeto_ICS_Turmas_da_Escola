CREATE DATABASE IF NOT EXISTS sistemanotas;
USE sistemanotas;

-- Tabela Aluno
CREATE TABLE Aluno (
    id INT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    senha VARCHAR(15) NOT NULL,
    turma_id INT,
    FOREIGN KEY (turma_id) REFERENCES Turma(turma_id)
);

-- Tabela Turma
CREATE TABLE Turma (
    turma_id INT PRIMARY KEY,
    nome_turma VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    professor_id INT,
    id INT
);

-- Tabela Professor
CREATE TABLE Professor (
    professor_id INT PRIMARY KEY,
    nome_professor VARCHAR(50) NOT NULL,
    senha_professor VARCHAR(50) NOT NULL,
    disciplina VARCHAR(50) NOT NULL,
    turma_id INT,
    FOREIGN KEY (turma_id) REFERENCES Turma(turma_id)
);
