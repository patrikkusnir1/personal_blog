<?php 

require 'includes/db.php';
echo $pdo->query('SELECT COUNT(*) FROM articles')->fetchColumn();