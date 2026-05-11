CREATE TABLE produto (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(30),
    peso_caixa NUMERIC(10,2),
    desconto_rotulo NUMERIC(10,2)
);

CREATE TABLE lote (
    id SERIAL PRIMARY KEY,
    numero_lote VARCHAR(50),
    peso_bruto NUMERIC(10,2),
    peso_liquido NUMERIC(10,2),
    id_produto INT REFERENCES produto(id)
);