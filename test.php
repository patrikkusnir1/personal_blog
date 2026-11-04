<?php 

require 'includes/db.php';

// read the schema file and execute it
$sql = file_get_contents(__DIR__ . '/database/schema.sql');
$pdo->exec($sql);

// check if exists
$stmt = $pdo->query('DESCRIBE comments');
$columns = $stmt->fetchAll();
print_r($columns);