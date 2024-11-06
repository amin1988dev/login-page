<?php
session_start();
require 'db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if ($email && $password) {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header('Location: welcome.php');
            exit;
        } else {
            $error = 'Email o password non corretta';
        }
    } else {
        $error = 'Per favore, inserisci tutti i campi';
    }

    $_SESSION['error'] = $error;
    header('Location: login.php');
    exit;
}
?>
