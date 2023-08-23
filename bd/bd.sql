-- Utiliza o banco de dados criado
USE d3f4ltco_techfix_db;

-- Tabela para estoque
CREATE TABLE estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(255) NOT NULL,
    categoria VARCHAR(255),
    quantidade INT,
    compradas INT,
    vendidas INT
);

-- Tabela para clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    CPF VARCHAR(14),
    celular VARCHAR(20),
    email VARCHAR(255),
    datadenascimento DATE
);

-- Tabela para relatório
CREATE TABLE relatorio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vendas DECIMAL(10, 2),
    gastos DECIMAL(10, 2)
);

-- Tabela para despesas
CREATE TABLE despesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    despesa VARCHAR(255) NOT NULL,
    tipo VARCHAR(255),
    valor DECIMAL(10, 2),
    data DATE,
    responsavel VARCHAR(255)
);

-- Tabela para usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    login VARCHAR(50) UNIQUE,
    email VARCHAR(255),
    senha VARCHAR(255),
    foto VARCHAR(255)
);
