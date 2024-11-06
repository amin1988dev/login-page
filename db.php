<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=login_system', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    die("Errore di connessione al database: " . $e->getMessage());
}
?>
