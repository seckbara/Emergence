<?php

namespace Emergence;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DBManager
{
    public function connect()
    {
        $config = new Configuration();
        $connParametr = array(
            'dbname' => 'emergence',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
            'port' => 3306,
            'charset' => 'utf8mb4'
        );
        return $conn = DriverManager::getConnection($connParametr, $config);
    }

    public function getlastId()
    {
    }
}
