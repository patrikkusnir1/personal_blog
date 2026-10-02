<?php 

$config   = require __DIR__ . '/config.php';
$host     = $config['host'];
$dbname   = $config['dbname'];
$user     = $config['user'];
$password = $config['password'];


try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password, [PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false]);
} catch (PDOException $e) {
		throw new PDOException('Database connection failed');
	}

