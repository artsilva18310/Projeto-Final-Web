CREATE TABLE produto (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(30),
    peso_caixa NUMERIC(10,2),
    desconto_rotulo NUMERIC(10,2),
    cep VARCHAR(9),
    rua VARCHAR(255),
    bairro VARCHAR(100),
    cidade VARCHAR(100)
);

CREATE TABLE lote (
    id SERIAL PRIMARY KEY,
    numero_lote VARCHAR(50),
    peso_bruto NUMERIC(10,2),
    peso_liquido NUMERIC(10,2),
    id_produto INT,
    FOREIGN KEY (id_produto) REFERENCES produto(id)
);

CREATE TABLE aviso (
    id SERIAL PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    autor VARCHAR(100) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE funcionario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    cargo VARCHAR(50),
    setor VARCHAR(50)
);

CREATE TABLE fornecedor (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(20),
    email VARCHAR(100)
);