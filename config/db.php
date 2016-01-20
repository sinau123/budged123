<?php


$config =  [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=pengeluaran',
    'username' => 'root',
    'password' => 'denis',
    'charset' => 'utf8',
];
@include 'db.override.php';
return $config;
