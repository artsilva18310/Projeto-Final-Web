# Sistema de Inventário

Projeto web desenvolvido com PHP seguindo o padrão MVC, com CRUDs locais para produtos e lotes e integração com API externa para CEP e MockAPI.

## 📋 Características

- ✅ CRUD completo de produtos com banco local
- ✅ CRUD completo de lotes com banco local
- ✅ Cadastro e listagem de avisos via MockAPI
- ✅ Busca automática de endereço pelo CEP (ViaCEP)
- ✅ Arquivo `.env` para configuração de ambiente
- ✅ Interface com navegação simples e responsiva

## 🏗️ Estrutura do Projeto

```
Projeto-Final-Web/
├── index.php
├── Database.php
├── create.sql
├── .env.example
├── .env
├── assets/
│   └── css/style.css
├── controller/
│   ├── ProdutoController.php
│   ├── LoteController.php
│   └── AvisoController.php
├── dao/
│   ├── ProdutoDao.php
│   └── LoteDao.php
├── model/
│   ├── Produto.php
│   ├── Lote.php
│   └── Aviso.php
└── view/
    ├── cadastra.php
    ├── lista.php
    ├── edita_produto.php
    ├── deletar_produto.php
    ├── cadastra_lote.php
    ├── lista_lote.php
    ├── edita_lote.php
    ├── deletar_lote.php
    ├── cadastra_aviso.php
    └── lista_aviso.php
```

## 🛠️ Requisitos

- PHP 8+
- PostgreSQL
- XAMPP ou servidor Apache com PHP e PostgreSQL
- Navegador moderno

## 📦 Instalação

### 1. Configure o ambiente

Copie o arquivo `.env.example` para `.env` e ajuste os valores.

### 2. Crie o banco de dados

Importe o arquivo `create.sql` no PostgreSQL.

### 3. Acesse a aplicação localmente

```text
http://localhost/Projeto-Final-Web
```

### 4. Configure a VM da disciplina

Se for publicar na VM, o projeto deve ficar dentro da pasta:

```text
/home/seu_usuario/public_html
```

A URL ficará no formato:

```text
http://177.44.248.29/seu_usuario/
```

## 🔐 Variáveis de ambiente

O projeto utiliza `.env` para armazenar:

- `DB_DRIVER`, `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, `DB_PASS`
- `MOCKAPI_URL`

## 🌐 Funcionalidades

- Produtos: cadastro, listagem, edição e exclusão
- Lotes: cadastro, listagem, edição e exclusão
- Avisos: cadastro e listagem via MockAPI
- CEP: preenchimento automático com ViaCEP

## 📄 Observação

O arquivo `.env` não deve ser enviado ao GitHub.

