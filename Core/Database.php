<?php

namespace Core;

defined('APP_PATH') OR exit('No direct script access allowed');

class Database
{
    public $connection;
    public $statement;

    public function __construct( $username = 'root', $password = '' )
    {
        $config = [
            'host' => 'localhost',
            'port' => 3306,
            'dbname' => 'custom-php-framework',
            'charset' => 'utf8mb4'
        ];

        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";

        $this->connection = new \PDO($dsn , $username , $password , [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public function query($query , $params = [])
    {
       $this->statement = $this->connection->prepare($query); //dd($query);

       $this->statement->execute($params);

        return $this;
    }

    public function getLastInsertId() {
        return $this->connection->lastInsertId();
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

}