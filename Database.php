<?php
// Arquivo principal de conexão com o banco.
// Carrega as variáveis do arquivo .env e cria a conexão PDO usada por todos os DAOs.

class Database
{
    public PDO $connection;

    public function __construct()
    {
        $this->loadEnvFile(__DIR__ . '/.env');

        $driver = getenv('DB_DRIVER') ?: 'pgsql';
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_PORT') ?: '5432';
        $db   = getenv('DB_NAME') ?: 'inventario';
        $user = getenv('DB_USER') ?: 'postgres';
        $pass = getenv('DB_PASS') ?: 'postgres';
        $charset = getenv('DB_CHARSET') ?: 'utf8';

        if ($driver === 'pgsql') {
            $dsn = "pgsql:host=$host;port=$port;dbname=$db";
        } else {
            $dsn = "$driver:host=$host;port=$port;dbname=$db;charset=$charset";
        }

        if ($user === 'seu_usuario' || $pass === 'sua_senha') {
            throw new RuntimeException(
                'Credenciais do banco ainda estão com valores padrão no arquivo .env. ' .
                'Atualize DB_USER e DB_PASS com os dados reais da sua VM ou do seu ambiente local.'
            );
        }

        try {
            $this->connection = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            throw new PDOException(
                'Não foi possível conectar ao banco. Verifique DB_HOST, DB_PORT, DB_NAME, DB_USER e DB_PASS no arquivo .env. ' .
                $e->getMessage()
            );
        }
    }

    private function loadEnvFile(string $path): void
    {
        if (!is_file($path)) {
            return;
        }

        foreach (file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            [$key, $value] = array_pad(explode('=', $line, 2), 2, '');
            $key = trim($key);
            $value = trim($value);

            if ($key === '') {
                continue;
            }

            if (!array_key_exists($key, $_SERVER)) {
                putenv("$key=$value");
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
            }
        }
    }
}