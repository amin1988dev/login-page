<?php
session_start();
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4C+sXw+1YQGIVG2dN8xYP4y+FZY5R+I5TAdTzW/Z+7Jg/1uUpjrB3VYUn0Z0OtIk2iUtg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css"> <!-- Include il file CSS esterno -->
</head>
<body>
    <div class="form-container">
        <h3 class="text-center mb-4">Login <i class="fas fa-user-lock"></i></h3>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="process_login.php">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" id="email" placeholder="Inserisci la tua email" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" class="form-control" id="password" placeholder="Inserisci la tua password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Accedi</button>
            <div class="text-center mt-4">
                <a href="register.php">Non hai un account? Registrati</a>
            </div>
        </form>
    </div>
</body>
</html>
