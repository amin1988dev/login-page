<?php
session_start();
require 'db.php'; // File per la connessione al database

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($email && $password && $confirm_password) {
        if ($password === $confirm_password) {
            $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $existingUser = $stmt->fetch();

            if (!$existingUser) {
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (:email, :password)');
                $stmt->execute(['email' => $email, 'password' => $hashed_password]);
                $success = 'Registrazione completata con successo. Ora puoi <a href="login.php">accedere</a>.';
            } else {
                $error = 'L\'email è già registrata.';
            }
        } else {
            $error = 'Le password non coincidono.';
        }
    } else {
        $error = 'Compila tutti i campi.';
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4C+sXw+1YQGIVG2dN8xYP4y+FZY5R+I5TAdTzW/Z+7Jg/1uUpjrB3VYUn0Z0OtIk2iUtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css"> <!-- Include il file CSS esterno -->
</head>
<body>
    <div class="form-container">
        <h3 class="text-center mb-4">Registrati <i class="fas fa-user-plus"></i></h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <form method="POST" action="register.php">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Inserisci la tua email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" id="password" placeholder="Inserisci la tua password" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Conferma la tua password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Registrati</button>
            <div class="text-center mt-4">
                <a href="login.php">Hai già un account? Accedi</a>
            </div>
        </form>
    </div>
</body>
</html>
