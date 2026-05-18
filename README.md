# Sistema de Inventário

Um sistema web para controle e gerenciamento de produtos e lotes do inventário, desenvolvido com PHP seguindo o padrão arquitetural MVC (Model-View-Controller).

## 📋 Características

- ✅ Cadastro de produtos com informações detalhadas
- ✅ Controle de lotes de produtos
- ✅ Listagem e organização de produtos e lotes
- ✅ Cálculo de peso e desconto de rótulos
- ✅ Interface web intuitiva

## 🏗️ Estrutura do Projeto

```
Projeto-Final-Web/
├── index.php                 # Página inicial do sistema
├── Database.php              # Configuração da conexão com o banco de dados
├── create.sql                # Script para criar tabelas do banco de dados
│
├── assets/
│   └── css/
│       └── style.css         # Estilos CSS do projeto
│
├── model/
│   ├── Produto.php          # Modelo da entidade Produto
│   └── Lote.php             # Modelo da entidade Lote
│
├── controller/
│   ├── ProdutoController.php # Controlador de Produtos
│   └── LoteController.php    # Controlador de Lotes
│
├── dao/
│   ├── ProdutoDao.php       # Data Access Object para Produtos
│   └── LoteDao.php          # Data Access Object para Lotes
│
└── view/
    ├── cadastra.php         # Formulário de cadastro de produtos
    ├── lista.php            # Listagem de produtos
    ├── cadastra_lote.php    # Formulário de cadastro de lotes
    └── lista_lote.php       # Listagem de lotes
```

## 🛠️ Requisitos

- **PHP** 7.0 ou superior
- **MySQL/PostgreSQL** para o banco de dados
- **XAMPP** (ou equivalente) com Apache e banco de dados instalado
- **Navegador web** moderno

## 📦 Instalação

### 1. Preparar o banco de dados

Execute o script SQL para criar as tabelas:

```bash
mysql -u root < create.sql
```

Ou pela interface do phpMyAdmin:
- Acesse `http://localhost/phpmyadmin`
- Crie um novo banco de dados
- Importe o arquivo `create.sql`

### 2. Configurar a conexão com o banco

Edite o arquivo `Database.php` com suas credenciais:

```php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "seu_banco_de_dados";
```

### 3. Acessar a aplicação

Coloque os arquivos do projeto na pasta `htdocs` do XAMPP:

```
C:\xampp\htdocs\Projeto-Final-Web
```

Acesse no navegador:
```
http://localhost/Projeto-Final-Web
```

## 🚀 Como Usar

### Página Inicial
- Acesse `http://localhost/Projeto-Final-Web`
- Será apresentado um menu com 4 opções principais

### Operações Disponíveis

#### Produtos
- **Cadastrar Produto**: Adicione novos produtos com nome, tipo, peso da caixa e desconto do rótulo
- **Listar Produtos**: Visualize todos os produtos cadastrados no sistema

#### Lotes
- **Cadastrar Lote**: Registre novos lotes associados a um produto
- **Listar Lotes**: Visualize todos os lotes cadastrados com seus pesos bruto e líquido

## 📊 Estrutura do Banco de Dados

### Tabela: `produto`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | SERIAL | Identificador único (chave primária) |
| nome | VARCHAR(100) | Nome do produto |
| tipo | VARCHAR(30) | Tipo do produto (ex: PI, RÓTULO, SIMPLES) |
| peso_caixa | NUMERIC(10,2) | Peso unitário da caixa |
| desconto_rotulo | NUMERIC(10,2) | Desconto/peso do rótulo |

### Tabela: `lote`
| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | SERIAL | Identificador único (chave primária) |
| numero_lote | VARCHAR(50) | Número identificador do lote |
| peso_bruto | NUMERIC(10,2) | Peso bruto do lote |
| peso_liquido | NUMERIC(10,2) | Peso líquido do lote |
| id_produto | INT | Referência ao produto (chave estrangeira) |

## 🎨 Personalização

Os estilos CSS podem ser customizados no arquivo:
```
assets/css/style.css
```

## 🐛 Troubleshooting

### Erro de conexão com banco de dados
- Verifique se o MySQL/PostgreSQL está em execução
- Confirme as credenciais em `Database.php`
- Verifique se o banco de dados foi criado

### Página em branco
- Ative o display de erros em `Database.php`
- Verifique os logs do Apache em `xampp/apache/logs/`

## 📝 Notas de Desenvolvimento

- O projeto segue o padrão MVC para melhor organização e manutenção
- Os modelos (Model) contêm apenas os dados
- Os controladores (Controller) tratam a lógica de negócio
- Os DAOs (Data Access Objects) gerenciam a persistência de dados
- As views são responsáveis pela apresentação

## 📄 Licença

Este projeto é fornecido como está para fins educacionais.

---

**Última atualização**: Maio de 2026
