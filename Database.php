<?php

class Database
{
    public $connection;

    public function __construct( $username = 'root', $password = '' )
    {
        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'custom-php-framework',
            'charset' => 'utf8mb4'
        ];

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection = new PDO($dsn , $username , $password , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query , $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }

    public function getLastInsertId() {
        return $this->connection->lastInsertId();
    }
}