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
            'password' => 'mamadou',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
            'port' => 3306,
            'charset' => 'utf8mb4'
        );
        return DriverManager::getConnection($connParametr, $config);
    }

    public function getlastId()
    {

    }
}


/*
Exemple d'utilisation pour se connecter via doctrine
$config = new \Doctrine\DBAL\Configuration();
//..
$connectionParams = array(
    'dbname' => 'mydb',
    'user' => 'user',
    'password' => 'secret',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

$articles = $conn->fetchAll('select * from articles');

$count = $conn->executeUpdate('UPDATE user SET username = ? WHERE id = ?', array('jwage', 1));

$conn->insert('user', array('username' => 'jwage'));

$conn->update('user', array('username' => 'jwage'), array('id' => 1));

$qb = $conn->createQueryBuilder()
    ->select('u.id')
    ->addSelect('p.id')
    ->from('users', 'u')
    ->leftJoin('u', 'phonenumbers', 'u.id = p.user_id');

$results = $qb->getQuery()->execute(); */
