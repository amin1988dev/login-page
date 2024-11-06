<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-container {
            text-align: center;
        }
        .welcome-container h1 {
            font-size: 2.5rem;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
        <p class="mt-4"><a href="logout.php" class="btn btn-secondary">Logout</a></p>
    </div>
</body>
</html>
