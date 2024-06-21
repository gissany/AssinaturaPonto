<?php

try {
    $bd = new PDO("mysql:dbname=assinaturaponto;host=35.188.213.83", "root", "569875");
} catch(PDOException $e) {
    echo "Falha ao conectar o banco de dados: " . $e->getMessage();
    exit;
}

?>