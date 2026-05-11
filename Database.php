<?php

// Responsável por criar e fornecer a conexão com o banco de dados
class Database
{
    public $connection; // conexão PDO acessada pelo DAO

    public function __construct()
    {
        $host = "localhost";
        $port = "5432";
        $db   = "inventario";
        $user = "postgres";
        $pass = "postgres";

        $dsn = "pgsql:host=$host;port=$port;dbname=$db";

        $this->connection = new PDO($dsn, $user, $pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}